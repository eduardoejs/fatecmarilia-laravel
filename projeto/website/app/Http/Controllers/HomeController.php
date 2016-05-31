<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('restrict.index');
    }
    
    public function trocarSenha()
    {        
        $user = Auth::user();
        return view('restrict.users.firstAccess',  compact('user'));
    }
}
