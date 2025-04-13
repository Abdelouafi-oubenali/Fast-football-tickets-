<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\tickets;
use App\Models\TicketsInfo;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'ticket_info_id' => 'required|exists:tickets_infos,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $ticketInfo = TicketsInfo::with(['match.homeTeam', 'match.awayTeam'])
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
           
            dd("hellow");
            return back()
                ->with('error', 'Erreur lors du traitement du paiement: ' . $e->getMessage())
                ->withInput();
        }
    }

  
    public function success(Request $request, $ticket_info_id)
    {
        try {
            $ticketInfo = TicketsInfo::with('match')->findOrFail($ticket_info_id);
            
            $ticketInfo->update([
                'status' => 'paid',
                'paid_at' => now()
            ]);
    
            return view('payment.success', [
                'ticketInfo' => $ticketInfo,
                'match' => $ticketInfo->match
            ]);
    
        } catch (\Exception $e) {
            Log::error('Payment Success Error', [
                'error' => $e->getMessage(),
                'ticket_info_id' => $ticket_info_id
            ]);
            dd("hellow");
            return redirect()
                ->route('home')
                ->with('error', 'Paiement confirmé mais erreur lors de la mise à jour');
        }
    }


    public function cancel($ticket_info_id)
    {
        try {
            $ticketInfo = TicketsInfo::with('match')->findOrFail($ticket_info_id);
            
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
        $ticketInfo = TicketsInfo::findOrFail($ticketInfoId);
        $match = tickets::with(['homeTeam', 'awayTeam'])->findOrFail($ticketInfo->match_id);

        
        $pdf = Pdf::loadView('payment.PDF', [
            'match' => $match,
            'ticketInfo' => $ticketInfo
        ]);
        
        return $pdf->download('ticket-' . $ticketInfoId . '.pdf');
    }

}