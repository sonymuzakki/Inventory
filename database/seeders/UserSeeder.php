<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Http\Controllers\user;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('user');
    }
}