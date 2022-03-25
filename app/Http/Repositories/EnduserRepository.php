<?php 

namespace App\Http\Repositories;

use App\Models\User;
use App\Http\Interfaces\EnduserInterface;

class EnduserRepository implements EnduserInterface{

    public function index($id){
        
    
        $user=User::where('id',$id)->with('links')->first();
          
        return view('index',compact('user'));
      } 
}