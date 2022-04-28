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

    public function index(Request $request)
    {
        // session(['gabriele'=>'master']);
        // return session('gabriele');

        //restituisce master
        //$request->session()->get('gabriele');
        // return view('home');

        //restituisce insiem vuoto perchè pulisce tutte i dati di sessione
        // $request->session()->flush();
        // return $request->session()->all();


        // $request->session()->flash('message', 'Post has been created');
        // return $request->session()->get('message');

        // $request->session()->reflash();
        // $request->session()->keep('message');
    }
}
