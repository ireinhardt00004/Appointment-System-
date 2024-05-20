<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default admin user
        User::create([
            'lname' => 'Admin',
            'middlename' => 'Offline',
            'fname' => 'HRMO',
            'roles' => 'admin',
            'contact_num' => '09123456789',
            'email' => 'admin@example.com',
            'email_verified_at' => today(),
            'password' => Hash::make('789456123'),
        ]);
        User::create([
            'lname' => 'Backup Admin',
            'middlename' => 'Offline',
            'fname' => 'HRMO',
            'roles' => 'admin',
            'contact_num' => '09123456789',
            'email' => 'admin.backup@gmail.com',
            'email_verified_at' => today(),
            'password' => Hash::make('789456123'),
        ]);
        // You can add more users here if needed
    }
}
