<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function validatelogin(Request $request)
    {   
        $request->validate([
            $this->username()=> 'required|email',
            'password' => 'required|string',
        ], [
            $this->username() . '.required' => 'kolom ' . $this->username() . ' tidak boleh kosong broo ',

            $this->username() . 'email' => 'kolom ' . $this->username() . ' harus berupa email',
            'password.required' => 'kolom password tidak boleh kosong ngabs',
            'password.string' => 'kolom harus berupa text bro',

            
        ]);
       
    }
}
