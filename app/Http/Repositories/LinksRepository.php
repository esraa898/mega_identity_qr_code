<?php 

namespace App\Http\Repositories;

use App\Models\link;
use App\Models\iconModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\LinksInterface;

class LinksRepository implements LinksInterface{



    public function index()
  {
        $links= link::where('user_id',Auth::user()->id)->with('icon')->get();
       
    return view('links.userlinks',compact('links'));
  }


  public function create(){

    $icons= iconModel::get();
    
    return view('links.addlink',compact('icons'));
  }
  public function store( $request)
  {
    $request->validate([
            'platform_url' => 'required',
            'platform_name' => 'required',
            
    ]);
    Link::create(
   [
    'platform_url' => $request->platform_url,
    'platform_name' => $request->platform_name,
     'icon_id'=>$request->icon_id,
    'user_id' => Auth::user()->id,
   ]);
     Session()->flash('done', 'The Link added successfully!');
     return  redirect('links');
  }
 

  public function edit($id)
  {

    $link=link::find($id);
    $icons=iconModel::get();
    return  view('links.editlink',compact('link','icons'));
  }

  public function update( $request, $id)
  {
    $request->validate([
            'platform_url' => 'required',
            'platform_name' => 'required',
            'user_id' => 'required',
    ]);
    $link = Link::find($id);
    $link->update([
        'platform_url'=> $request->platform_url,
        'platform_name'=> $request->platform_name,
        'user_id'=>$request->user_id,
        'icon_id'=>$request->icon_id
      ]);

      session()->flash('done','updated succesfully');
      return  redirect('links');
    
    }
     


  

  public function delete($id)
  {
    $query = Link::find($id);
    $query->delete();
    session()->flash('done','deleted succesfully');
    return  redirect('links');
  }
}