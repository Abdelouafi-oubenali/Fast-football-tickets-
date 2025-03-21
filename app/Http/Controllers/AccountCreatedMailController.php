<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountCreatedMailController extends Controller
{


  public function sendResetLink(Request $request)
{
    // Validation des données reçues
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'role' => 'required|string',  
        'status' => 'required|string',  
    ]);

    $password = Str::random(10);

    DB::table('users')->insert([
        'nom' => $request->name,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => Hash::make($password),  
        'role' => $request->role, 
        'status' => $request->status,  
    ]);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abdelouafirca@gmail.com';
        $mail->Password = 'jabp eblt lhin mecm';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPDebug = 2; 
        
        $mail->setFrom('your_email@gmail.com', 'Support MECA_DIAGNOSTICS');
        $mail->addAddress($request->email);
        
        $mail->isHTML(true);
        $mail->Subject = 'Création de votre compte utilisateur';
        $mail->Body = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Création de compte utilisateur</title>
        </head>
        <body>
            <h1>Bienvenue sur notre plateforme</h1>
            <p>Nous avons créé un compte pour vous avec les informations suivantes :</p>
            <p><strong>Email :</strong> '$request->email'</p>
            <p><strong>Mot de passe :</strong>$password</p>
            <p>Vous pouvez maintenant vous connecter à votre compte avec ces informations.</p>
            <p>Si vous avez des questions ou si vous avez besoin d'aide, n'hésitez pas à nous contacter.</p>
            <p>Merci de votre confiance.</p>
            <p><em>Si vous n'avez pas demandé la création de ce compte, veuillez ignorer cet e-mail.</em></p>
        </body>
        </html>";

        $mail->send();

        return back()->with('success', 'Un email de confirmation a été envoyé avec les détails de votre compte.');
    } catch (\Exception $e) {
        return back()->withErrors(['email' => 'Échec de l\'envoi de l\'email : ' . $e->getMessage()]);
    }
}

}