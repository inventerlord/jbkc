<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'user_management_menu']);
        Permission::create(['name' => 'setting_menu']);
        Permission::create(['name' => 'tool_menu']);
        Permission::create(['name' => 'course_menu']);
        Permission::create(['name' => 'exam_menu']);

        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'profile_read']);
        Permission::create(['name' => 'profile_update']);
        //Role
        Permission::create(['name' => 'role_read']);
        Permission::create(['name' => 'role_update']);
        Permission::create(['name' => 'role_delete']);
        Permission::create(['name' => 'role_create']);
        // user
        Permission::create(['name' => 'user_create']);
        Permission::create(['name' => 'user_read']);
        Permission::create(['name' => 'user_update']);
        Permission::create(['name' => 'user_delete']);
        // pemissions
        Permission::create(['name' => 'permission_read']);
        Permission::create(['name' => 'permission_create']);
        Permission::create(['name' => 'permission_delete']);
        Permission::create(['name' => 'permission_update']);
        // site settings
        Permission::create(['name' => 'setting_site_read']);
        Permission::create(['name' => 'setting_site_update']);
    }
}
