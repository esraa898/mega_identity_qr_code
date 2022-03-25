<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\EnduserInterface;


class EndUserController extends Controller
{
   protected $enduserInterface;

  public function __construct(EnduserInterface $enduserInterface)
  {
    $this->enduserInterface=$enduserInterface;
  }
    
      public function index($id){
       return  $this->enduserInterface->index($id);
      } 

}
