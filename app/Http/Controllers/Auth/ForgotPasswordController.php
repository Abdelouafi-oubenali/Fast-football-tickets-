<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60); 

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Envoyer l'e-mail
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'abdelouafirca@gmail.com';
            $mail->Password = 'ajqa plat tlsm ddht';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your_email@gmail.com', 'Support MECA_DIAGNOSTICS');
            $mail->addAddress($request->email);

            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation du mot de passe';
            $mail->Body = '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Réinitialisation du mot de passe</title>
            </head>
            <body>
                <h1>Réinitialisation du mot de passe</h1>
                <p>Vous avez demandé une réinitialisation de votre mot de passe. Cliquez sur le lien suivant :</p>
                <a href="' . url('/reset-password/' . $token) . '">Réinitialiser le mot de passe</a>
                <p>Si vous n\'avez pas fait cette demande, veuillez ignorer cet e-mail.</p>
            </body>
            </html>';

            $mail->send();

            return back()->with('success', 'Un lien de réinitialisation a été envoyé à votre adresse e-mail.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Échec de l\'envoi de l\'e-mail : ' . $e->getMessage()]);
        }
    }
}