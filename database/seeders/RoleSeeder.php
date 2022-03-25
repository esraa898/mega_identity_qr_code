<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin= Role::create([
            'name'=> 'Superadmin'
            ,'display_name'=>'Superadmin',
            'description'=> 'Can  view and edit users details '

        ]);
  
        $user= Role::create([
            'name'=> 'user'
            ,'display_name'=>'user',
            'description'=> 'Can  view and edit his details '

        ]);
       
    }
}
