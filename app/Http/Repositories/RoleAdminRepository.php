<?php
namespace App\Http\Repositories;

use App\Models\link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\RoleAdminInterface;

class RoleAdminRepository implements RoleAdminInterface{




    public function index(){
        $users= User::with('links')->get();

        return view( 'Admin.allusers',compact('users'));
    }

    public function links($id){
      $user_id= $id;
      $links= link::with('icon')->where('user_id',$id)->get();

      return view('Admin.userlinks',compact('links','user_id'));
    }


    public function editRole($id){
      $user= User::find($id);
      return view('Admin.Rolechange',compact('user'));

    }


    
    public function roleChange($request , $user){
  

     
      $user = User::find($request->user_id);
      $request->validate([
        'name' =>'required',
        'roles' => 'required|array|min:1'
      ]);
      $requestdata =$request->except('email');
      
      $user->update($requestdata);
      
    $user->syncRoles($request->roles);

  return  back();

    }
    
}