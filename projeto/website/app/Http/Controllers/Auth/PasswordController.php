<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    
    // assim que o usuario fizer o reset de sua senha ja sera redirecionado para 
    // a pagina abaixo
    protected $redirectPath = '/dashboard';

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->subject = 'Redefinição de Senha'; //https://laracasts.com/discuss/channels/general-discussion/laravel-5-password-reset-link-subject
    }
}
