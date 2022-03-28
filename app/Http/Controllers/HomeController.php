<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\HomeInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     protected $HomeInterface; 
    public function __construct( HomeInterface $homeInterface)

    {
        $this->HomeInterface=$homeInterface;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return $this->HomeInterface->index();
    }
}
