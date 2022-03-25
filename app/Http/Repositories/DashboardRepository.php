<?php 

namespace App\Http\Repositories;

use App\Models\User;
use App\Http\Interfaces\DashboardInterface;

class DashboardRepository implements DashboardInterface{

    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }elseif($id == 'allusers'){
            $users= User::get();
             return view('users.allusers',compact('users'));
        }
        else
        {
            return view('404');
        }
    }




}

