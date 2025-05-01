<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Matches;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Barryvdh\DomPDF\Facade\Pdf; 
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function minice_places($matchId, $quantity, $category)
    {
     
        $categoryInfo = Category::where('match_id', $matchId)
            ->where('nom', $category)
            ->first();
            // dd($categoryInfo->nombre_place);
            
            if ($categoryInfo) {
                $categoryInfo->update([
                    'nombre_place' => max(0, $categoryInfo->nombre_place - $quantity)
                ]);
                
          
        } else {    
            Log::error("Catégorie non trouvée pour match_id: $matchId et catégorie: $category");
        }
    }
    
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'ticket_info_id' => 'required|exists:Ticket,id',
            'amount' => 'required|numeric|min:1',
        ]);
        
        // dd("hellow abdelouafi ounenali");
        $ticketInfo = Ticket::with(['match.homeTeam', 'match.awayTeam'])
        ->findOrFail($validated['ticket_info_id']);

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            'name' => 'Billet: ' . $ticketInfo->match->homeTeam->name . ' vs ' . $ticketInfo->match->awayTeam->name,
                            'description' => 'Tribune ' . ucfirst($ticketInfo->category),
                        ],
                        'unit_amount' => $validated['amount'] * 100, 
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['ticket_info_id' => $ticketInfo->id]),
                'cancel_url' => route('payment.cancel', ['ticket_info_id' => $ticketInfo->id]),
                'metadata' => [
                    'ticket_info_id' => $ticketInfo->id,
                    'user_id' => auth()->id(),
                    'match_id' => $ticketInfo->match_id
                ],
                'customer_email' => auth()->user()->email,
            ]);

            return redirect($session->url);

        } catch (\Exception $e) {
            Log::error('Stripe Checkout Error', [
                'error' => $e->getMessage(),
                'ticket_info_id' => $validated['ticket_info_id'],
                'user_id' => auth()->id()
            ]);
           
            return back()
                ->with('error', 'Erreur lors du traitement du paiement: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function success(Request $request, $ticket_info_id)
    {
        try {
            $ticketInfo = Ticket::with('match')->findOrFail($ticket_info_id);
            
            $ticketInfo->update([
                'status' => 'paid',
                'paid_at' => now()
            ]);

            $pdf = Pdf::loadView('payment.PDF', [
                'match' => $ticketInfo->match,
                'ticketInfo' => $ticketInfo
            ]);
            $pdfPath = storage_path('app/public/ticket-' . $ticketInfo->id . '.pdf');
            $pdf->save($pdfPath);

        // updqte les plqce de match
          $this->minice_places($ticketInfo->match_id, $ticketInfo->quantity, $ticketInfo->category);

        // Envoiyer email
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'abdelouafirca@gmail.com'; 
                $mail->Password   = 'jabp eblt lhin mecm';   
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('tonemail@gmail.com', 'Support MECA_DIAGNOSTICS');
                $mail->addAddress(auth()->user()->email);

                $mail->isHTML(true);
                $mail->Subject = 'Votre billet est prêt !';
                $mail->Body    = '
                    <h1>Merci pour votre achat </h1>
                    <p>Match: <strong>' . $ticketInfo->match->homeTeam->name . ' vs ' . $ticketInfo->match->awayTeam->name . '</strong></p>
                    <p>Catégorie: ' . ucfirst($ticketInfo->category) . '</p>
                    <p>Date du match: ' . $ticketInfo->match->date . '</p>
                    <p>Votre billet est en pièce jointe 📎.</p>
                ';

                // Ajout du PDF 
                $mail->addAttachment($pdfPath, 'ticket-' . $ticketInfo->id . '.pdf');

                $mail->send();
            } catch (Exception $e) {
                Log::error('Erreur PHPMailer: ' . $mail->ErrorInfo);
            }

            return view('payment.success', [
                'ticketInfo' => $ticketInfo,
                'match' => $ticketInfo->match
            ]);

        } catch (\Exception $e) {
            Log::error('Payment Success Error', [
                'error' => $e->getMessage(),
                'ticket_info_id' => $ticket_info_id
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Paiement confirmé mais erreur lors de la mise à jour');
        }
    }

    public function cancel($ticket_info_id)
    {
        try {
            $ticketInfo = Ticket::with('match')->findOrFail($ticket_info_id);
            
            return view('resravasion.cancel', [
                'ticketInfo' => $ticketInfo,
                'match' => $ticketInfo->match
            ]);

        } catch (\Exception $e) {
            Log::error('Payment Cancel Error', [
                'error' => $e->getMessage(),
                'ticket_info_id' => $ticket_info_id
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Erreur lors du traitement de l\'annulation');
        }
    }

    public function downloadTicketPdf($ticketInfoId)
    {
        $ticketInfo = Ticket::findOrFail($ticketInfoId);
        $match = Matches::with(['homeTeam', 'awayTeam'])->findOrFail($ticketInfo->match_id);

        $pdf = Pdf::loadView('payment.PDF', [
            'match' => $match,
            'ticketInfo' => $ticketInfo
        ]);
        
        return $pdf->download('ticket-' . $ticketInfoId . '.pdf');
    }
}
