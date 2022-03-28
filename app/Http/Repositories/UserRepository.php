<?php 

namespace App\Http\Repositories;

use App\Models\User;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\UserInterface;


class UserRepository implements UserInterface {

    
    use ImageTrait;
    public function index()
    {
        $user= Auth::user();
    
        return view("users.user", compact('user'));
    }
  
   
    public function update( $request, $id)

    {
        $user = User::find($id);
        if(
            $request->has('photo')){

            $fileName= time().'username.png';
            $oldfile= 'images\\'.$request->name.'\\'.$user->photo;
            $this->uploadImage($request->photo,$fileName,$request->name,$oldfile);
        }
       
        
        $user->name = $request->name;
        $user->title = $request->title;
        $user->phone_number = $request->phone_number;
        $user->email = $user->email;
        $user->photo =(isset($fileName)) ? $fileName : $user->getRawOriginal('photo');
        $user->location= $request->location;
        $user->password = $request->password;
      
        $user->save();
        Session()->flash('done', 'Updated succesfully');
        return redirect("/user");
    }
   
    public function delete($id){

        $user = User::find($id);
        $oldfile='images\\'.$user->name.'\\'.$user->photo;
        unlink(public_path($oldfile));
        $user->delete();
        Session()->flash('done', 'Deleted succesfully');
        return redirect('/login');
    }
}