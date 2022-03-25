<?php 

namespace App\Http\Repositories;

use App\Models\iconModel;
use App\Http\Traits\ImageTrait;
use App\Http\Interfaces\IconInterface;

class IconRepository implements IconInterface{

    use ImageTrait;



    public function index(){
 
   $icons = iconModel::get();
     return view('icons.icons',compact('icons'));
    }
 
    public function create(){
 
     return view('icons.addicon');
    }
     public function store( $request){
 
 
         $fileName= time().'icon.png';
         $this->uploadImage($request->icon,$fileName,'icons');
         iconModel::create([
             'name'=>$request->name,
             'icon'=>$fileName,
         ]);
        session()->flash('Add','Added sucesfully');
        return redirect('icon');
 
 
     }
 
     public function edit($id){
 
           $icon =iconModel::find($id);
          return view('icons.editicon',compact('icon'));
 
     }
 
 
     public function update( $request,$id){
         $icon =iconModel::find($id);
 
         
         if($request->has('icon')){
             $fileName= time().'icon.png';
         $oldfile= 'images\icons\\'.$icon->icon;
         $this->uploadImage($request->icon,$fileName,'icons',$oldfile);
     }
 
         $icon->update([
             'name'=>$request->name,
             'icon'=> (isset($fileName)) ? $fileName : $icon->getRawOriginal('icon')
         ]);
 
 
         session()->flash('Add','Updated sucesfully');
         return redirect('icon');
 
     }
 
     public function delete($id){
         $icon =iconModel::find($id);
       
         $oldfile= 'images\icons\\'.$icon->icon;
         unlink(public_path($oldfile));
         $icon->delete();
         session()->flash('Add','deleted sucesfully');
         return redirect('icon');
     }



}