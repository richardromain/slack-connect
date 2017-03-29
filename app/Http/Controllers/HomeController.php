<?php

namespace App\Http\Controllers;

use App\Providers\SlackServiceProvider;
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
        $slack = new SlackServiceProvider();
        $messages = $slack->getChannelMessages('C09C27RAT', 5);

        return view('home', compact('messages'));
    }
}
