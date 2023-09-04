<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('slug', '=', 'admin')->first()->id;
        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@sample.com',
            'password' => Hash::make('Admin123!@#'),
            'role_id' => $role,
            'status' => 1
        ]);
        UserDetail::create([
            'user_id' => $admin->id,
        ]);

        $role = Role::where('slug', '=', 'user')->first()->id;
        $user = User::create([
            'username' => 'User',
            'email' => 'user@sample.com',
            'password' => Hash::make('User123!@#'),
            'role_id' => $role,
            'status' => 1
        ]);
        UserDetail::create([
            'user_id' => $user->id,
        ]);
    }
}
