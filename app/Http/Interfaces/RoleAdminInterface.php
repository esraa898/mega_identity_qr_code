<?php 
namespace App\Http\Interfaces;

interface RoleAdminInterface {

    public function index();
    public function links($id);
    public function editRole($id);
    public function roleChange( $request , $user);
 
}