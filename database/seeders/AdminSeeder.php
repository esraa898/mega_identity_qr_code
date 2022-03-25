<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            'name'  =>'superadmin'
            ,'email'=> 'Super_admin@gmail.com',
            'password'=> Hash::make('123456789'),
            'title'=>  'CEO',
            'phone_number'=>'01215987656',
             'location'=>'Alexandria',
             'photo'=>'defaultprofile.png'
        ]);
        $user->attachRole('Superadmin');

        
    }
}
