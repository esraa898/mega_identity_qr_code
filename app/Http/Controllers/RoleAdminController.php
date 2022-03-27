<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\RoleAdminInterface;
use App\Models\link;
use App\Models\User;
use Illuminate\Http\Request;

class RoleAdminController extends Controller
{
    
 protected $RoleAdminInterface;
  public function __construct(RoleAdminInterface $roleAdminInterface ){

  $this->RoleAdminInterface=$roleAdminInterface;
    $this->middleware(['role:Superadmin']);
  }


    public function index(){
 
      return $this->RoleAdminInterface->index();
    }

    public function links($id){
     
      return $this->RoleAdminInterface->links($id);
    }

    public function editRole($id){
      return $this->RoleAdminInterface->editRole($id);


    }
    public function roleChange(Request $request ,User $user){
  

     return $this->RoleAdminInterface->roleChange($request,$user);

    }
}
