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
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>
            <body style="background-color: #f7fafc; font-family: Arial, sans-serif; margin: 0; padding: 0;">
                <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <div style="background-color: #3182ce; display: inline-block; padding: 10px; border-radius: 50%;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px; color: #ffffff;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                        </div>
                    </div>
                    <h1 style="font-size: 24px; font-weight: bold; text-align: center; color: #2d3748; margin-bottom: 16px;">Réinitialisation du mot de passe</h1>
                    <div style="border-top: 1px solid #e2e8f0; margin-bottom: 16px;"></div>
                    <p style="color: #4a5568; margin-bottom: 20px;">Vous avez demandé une réinitialisation de votre mot de passe. Cliquez sur le bouton ci-dessous pour créer un nouveau mot de passe :</p>
                    <div style="text-align: center; margin-bottom: 20px;">
                        <a href="' . url('/reset-password/' . $token) . '" style="display: inline-block; padding: 12px 24px; background-color: #3182ce; color: #ffffff; font-weight: bold; font-size: 14px; border-radius: 4px; text-decoration: none;">
                            Réinitialiser mon mot de passe
                        </a>
                    </div>
                    <p style="font-size: 12px; color: #718096; margin-bottom: 8px;">Si vous n\'avez pas fait cette demande, veuillez ignorer cet e-mail.</p>
                    <p style="font-size: 12px; color: #718096;">Ce lien expirera dans 60 minutes.</p>
                    <div style="border-top: 1px solid #e2e8f0; margin-top: 20px; padding-top: 16px;">
                        <p style="font-size: 12px; text-align: center; color: #a0aec0;">© 2025 VotreEntreprise. Tous droits réservés.</p>
                    </div>
                </div>
            </body>
            </html>';

         $mail->send();

            return back()->with('success', 'Un lien de réinitialisation a été envoyé à votre adresse e-mail.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Échec de l\'envoi de l\'e-mail : ' . $e->getMessage()]);
        }
    }
}