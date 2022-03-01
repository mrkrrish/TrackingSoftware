<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
    **/
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Kapil Soni',
            'email'=>'kapilsony1@outlook.com',
            'password'=>Hash::make('admin_secret@124'),
            'phone_no'=>'9355999996',
            'role'=>'Admin',
            'status'=>1
            ]);
    }
}
