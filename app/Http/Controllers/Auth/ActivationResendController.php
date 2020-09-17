<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ActivationResendController extends Controller
{
    public $user;

    public function showResendForm(){
        return view('auth.activate.resend');
    }

    public function resend(Request $request){
        $this->validateResendRequest($request);
        //dd($request->all());
        $user = User::where('email', $request->email)->first();
        event(new UserActivationEmail($user));

        return redirect()->route('login')->withSuccess('L\'Email d\'activation vous a été envoyé');
    }

    protected function validateResendRequest(Request $request){
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ],
        [
            'email.exists' => 'Cette adresse mail n\'existe pas, veuiller vérifier votre compte mail'
        ]);
    }
}
