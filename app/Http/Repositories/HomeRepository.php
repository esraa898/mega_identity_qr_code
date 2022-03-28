<?php 

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\HomeInterface;

class HomeRepository implements HomeInterface{

    public function index()
    {
        if (Auth::check()){
            $user=Auth::user();
                return view('users/user',compact('user'));
                }
                else{
    return view('auth.login');
    }
}

}