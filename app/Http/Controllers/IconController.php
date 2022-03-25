<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Http\Interfaces\IconInterface;

class IconController extends Controller
{  
   
  use ImageTrait;

    protected $iconInterface;

    public function __construct(IconInterface $iconInterface)
    {
        $this->iconInterface=$iconInterface;
    }



   public function index(){


    return $this->iconInterface->index();
   }

   public function create(){

    return  $this->iconInterface->create();
   }
    public function store(Request $request){


       return  $this->iconInterface->store($request);


    }

    public function edit($id){

         return $this->iconInterface->edit($id) ;

    }


    public function update(Request $request,$id){

        return $this->iconInterface->update($request,$id);

    }

    public function delete($id){
    
        return $this->iconInterface->delete($id);
    }
    
}
