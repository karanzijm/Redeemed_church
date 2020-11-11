<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Church;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('generic.sidebar',['title'=>'Redeemed Church']);

        // return view('myviews.sendMessage');
        // return view('layouts.myfile');
        // return view('generic.mysidebar');
    }

    public function getAll()
    {
        $congregation = Church::latest()->get();
        // dd($congregation);
        return view('generic.table',['congregation'=>$congregation , 'title'=>'Redeemed Church']);
    }
}
