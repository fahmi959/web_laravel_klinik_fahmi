<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        $user = User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "username" => "adminr",
            "phone" => "089529909036",
            'password' => bcrypt('qweqwe'),
            'email_verified_at' => Carbon::now()
        ]);
        // $user->assignRole('Admin');
    }
}
