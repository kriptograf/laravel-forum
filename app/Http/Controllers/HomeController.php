<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;
use App\Filters\ThreadsFilters;

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
        $threads = Thread::take(10)->orderBy('created_at', 'desc')->get();

        return view('home', [
            'threads' => $threads
        ]);
    }

    public function welcome()
    {
        $threads = Thread::take(10)->orderBy('created_at', 'desc')->get();

        return view('home', [
            'threads' => $threads
        ]);
    }
}
