<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name' => 'Admin',
            'email' => 'valeroy51@gmail.com',
            'kelas' => 'Admin Class',
            'absen' => 999,
            'password' => Hash::make('admin'), 
            'admin' => true,
            'email_verified_at' =>  '2004-09-28 00:00:00',
            'alamat' =>  '-'
        ]);
    }
}
