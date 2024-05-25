<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::updateOrCreate(['name' => 'admin']);
        $masyarakatRole = Role::updateOrCreate(['name' => 'masyarakat']);

        $adminPermissions = Permission::where('name', 'like', 'admin-%')->get();
        $adminRole->syncPermissions($adminPermissions);

        $masyarakatPermissions = Permission::where('name', 'like', 'masyarakat-%')->get();
        $masyarakatRole->syncPermissions($masyarakatPermissions);
    }
}
