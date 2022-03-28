<?php
namespace App\Http\Repositories;

use App\Models\User;
use App\Http\Traits\ImageTrait;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Interfaces\RegisterInterface;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterRepository implements RegisterInterface{


    protected $redirectTo = RouteServiceProvider::HOME;

    use ImageTrait;
    use RegistersUsers;
    public function validator($data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create( $data)
    {

        $fileName= time().'username'.'.png';
       $this->uploadImage($data['photo'],$fileName,$data['name']);
       $user= User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'title'=>$data['title'],
            'photo'=>$fileName,
            'phone_number'=>$data['phone_number'],
            'location'=>$data['location']
        ]);

        $user->attachRole('user');

          return $user;
                }

       
        

}