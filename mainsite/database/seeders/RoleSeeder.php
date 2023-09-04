<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = Permission::all()->pluck('id')->toArray();
        $adminRole = new Role();
        $adminRole->name = "Admin";
        $adminRole->slug = Str::slug("Admin");
        $adminRole->save();
        $adminRole->permissions()->sync($adminPermissions);

        $userPermissions = Permission::where('name', 'profile_read')->orWhere('name', 'profile_update')->pluck('id')->toArray();
        $userRole = new Role();
        $userRole->name = "User";
        $userRole->slug = Str::slug("User");
        $userRole->save();
        $userRole->permissions()->sync($userPermissions);
    }
}
