<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use mailer\src\PHPMailer;
// use PHPMailer\PHPMailer\PHPMailer;
// use mailer\src\SMTP;
// use mailer\src\Exception;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }


    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user->save();

        // $mail = new PHPMailer(true);

        // try {
        //     //Server settings
        //     $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        //     $mail->isSMTP(); //Send using SMTP
        //     $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        //     $mail->SMTPAuth = true; //Enable SMTP authentication
        //     $mail->Username = 'admiresecret71@gmail.com'; //SMTP username
        //     $mail->Password = 'pijgmkjbemfhcxrj'; //SMTP password
        //     // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        //     $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //     //Recipients
        //     $mail->setFrom('admiresecret71@gmail.com', 'Mailer');
        //     $mail->addAddress($request->email, $request->name); //Add a recipient
        //     // $mail->addAddress('ellen@example.com'); //Name is optional
        //     // $mail->addReplyTo('info@example.com', 'Information');
        //     // $mail->addCC('cc@example.com');
        //     // $mail->addBCC('bcc@example.com');

        //     //Attachments
        //     // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
        //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

        //     //Content
        //     $mail->isHTML(true); //Set email format to HTML
        //     $mail->Subject = 'Here is the subject';
        //     $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        //     $mail->send();
        //     echo 'Message has been sent';
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }

        return ["success" => true, "message" => "user Registered"];
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('login_token')->plainTextToken;
            return ["success" => true, "token" => $token, "user" => ["id" => $request->user()->id, "user" => $request->user()->name]];
        } else
            return ["success" => false, "message" => "wrong username or password"];
        // return $credentials;
    }

    public function checkToken()
    {
        return ["message" => "token works"];
    }

    public function addToCart(Request $request)
    {

    }

    // public function userProducts($id)
    // {
    //     $data = User::find($id)->products()->get();
    //     return $data;
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return $user;
    }



    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user->save();

        return ["success" => true, "message" => "user Updated"];
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     //
    // }


}