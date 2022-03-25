<?php

namespace App\Http\Controllers;

use App\Models\link;
use App\Models\User;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    

  public function __construct(){


    $this->middleware(['role:Superadmin']);
  }


    public function index(){
        $users= User::with('links')->get();

        return view( 'Admin.allusers',compact('users'));
    }

    public function links($id){
      $links= link::with('icon')->where('user_id',$id)->get();

      return view('links.userlinks',compact('links'));
    }


    public function roleChange(Request $request ,User $user){
  

     
    $request->validate([
      'name' =>'required',
      'roles' => 'required|array|min:1'
    ]);
    $requestdata =$request->except('email');
    $user->update($requestdata);
  
    dd($user->syncRoles($request->roles,$request->user_id));

  return  back();

    }
}
