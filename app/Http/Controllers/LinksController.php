<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Interfaces\LinksInterface;

class LinksController extends Controller
{


  protected $linksInterface;
  public function __construct(LinksInterface $linksInterface)
  {
    $this->linksInterface= $linksInterface;
  }
  public function index(){


    return $this->linksInterface->index();
   }

   public function create(){

    return  $this->linksInterface->create();
   }
    public function store(Request $request){


       return  $this->linksInterface->store($request);


    }

    public function edit($id){

         return $this->linksInterface->edit($id) ;

    }


    public function update(Request $request,$id){

        return $this->linksInterface->update($request,$id);

    }

    public function delete(Request $request){
    
        return $this->linksInterface->delete($request);
    }
}
