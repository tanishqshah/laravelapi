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
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'contact' => 'required',
            'password' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user->save();
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