<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\DashboardInterface;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $dashboardinterface;

     public function __construct(DashboardInterface $dashboardInterface)
     {

        $this->dashboardinterface=$dashboardInterface;
         
     }
    public function index($id)
    {
      return  $this->dashboardinterface->index($id);
    }

    
}
