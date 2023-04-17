<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'teller',
            'name' => fake()->name(),
            'email' => 'teller@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('teller123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
