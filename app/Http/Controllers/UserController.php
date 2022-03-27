<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\UserInterface;


class UserController extends Controller
{

    protected $UserInterface ;

    public function __construct(UserInterface $userinterface)
    {
        $this->UserInterface=$userinterface;
    }
   
    public function index()
    {
        return $this->UserInterface->index();
    }
  
   
    public function update(Request $request, $id)
    {
        return $this->UserInterface->update($request,$id);
    }
   
    public function delete($id){
         return $this->UserInterface->delete($id);
    }
}
