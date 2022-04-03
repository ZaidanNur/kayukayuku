<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Account Admin',
            'email'=> 'Admin@test.com',
            'password'=>bcrypt('1234asdf')
        ]);

        $admin-> assignRole('admin');

        $user = User::create([
            'name' => 'Account Customer',
            'email'=> 'Customer@test.com',
            'password'=>bcrypt('1234asdf')
        ]);

        $user-> assignRole('customer');
    }
}
