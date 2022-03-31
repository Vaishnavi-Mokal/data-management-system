<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>'1',
            'firstname'=>'Admin',
            'lastname'=>'admin',
            'email'=>'vpmokal27@gmail.com',
            'password'=>Hash::make('admin123'),
            'role'=>'Superadmin'
        
        ]);
    }
}
