<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles =  [
            [
              'role-id' => '1',
              'role-name' => 'Superadmin',
            ],
            [
                'role-id' => '2',
                'role-name' => 'User Admin',
            ],
            [
                'role-id' => '3',
                'role-name' => 'Sales Team',
            ],
          ];

          Role::insert($roles);

    }
}
