<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       $user = User::create([
           'first_name' => 'Super',
           'last_name' => 'Admin',
           'location' => 'cairo',
           'job_title' => 'Maneger',
           'mobile' => '01239456549',
           'email' => 'super_admin@gmail.com',
           'password' => bcrypt('123456'),
       ]);
       $user->attachRole('super_admin');

    }// end of eun
}//end of seeder
