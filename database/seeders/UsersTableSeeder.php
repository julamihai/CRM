<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name'=>'Default Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);

        $admin->role()->attach($adminRole);

        $user = User::create([
            'name'=>'Default User',
            'email'=>'user@user.com',
            'password'=>Hash::make('password')
        ]);
        $user->role()->attach($userRole);
    }
}
