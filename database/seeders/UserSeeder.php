<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::updateOrCreate(['name' => 'admin']);
        $masyarakatRole = Role::updateOrCreate(['name' => 'masyarakat']);

        $admin = User::updateOrCreate([
            'email' => 'a@a.a',
        ], [
            'name' => 'Admin',
            'password' => Hash::make('a'),
            'email_verified_at' => now(),
        ]);
        $admin->assignRole($adminRole);
    }
}
