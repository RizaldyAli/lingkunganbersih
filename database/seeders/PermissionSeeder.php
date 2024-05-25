<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = ['view', 'create', 'read', 'update', 'delete'];
        foreach ($adminPermissions as $permission) {
            Permission::updateOrCreate(['name' => 'admin-' . $permission]);
        }

        $masyarakatPermissions = ['view', 'create', 'read'];
        foreach ($masyarakatPermissions as $permission) {
            Permission::updateOrCreate(['name' => 'masyarakat-' . $permission]);
        }
    }
}
