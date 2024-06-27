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
            'kelas' => 'Admin',
            'absen' => 999,
            'password' => Hash::make('admin'), 
            'admin' => true,
            'email_verified_at' =>  '2004-09-28 00:00:00',
            'alamat' =>  '-'
        ]);
        //user biasa
        User::create([
            'name' => 'Stefanus Anthony Harry',
            'email' => 'valeroy.535220151@stu.untar.ac.id',
            'kelas' => '10 C',
            'absen' => 16,
            'password' => Hash::make('harry'), 
            'admin' => false,
            'email_verified_at' =>  '2004-09-28 00:00:00',
            'alamat' =>  '-'
        ]);
        //user biasa
        User::create([
            'name' => 'Valeroy Putra Sientika',
            'email' => 'valeroy52@gmail.com',
            'kelas' => '10 C',
            'absen' => 36,
            'password' => Hash::make('valeroy'), 
            'admin' => false,
            'email_verified_at' =>  '2004-09-28 00:00:00',
            'alamat' =>  '-'
        ]);
        //user biasa
        User::create([
            'name' => 'Hans Nathanael Tedja',
            'email' => 'valeroy913@gmail.com',
            'kelas' => '10 C',
            'absen' => 15,
            'password' => Hash::make('hans'), 
            'admin' => false,
            'email_verified_at' =>  '2004-09-28 00:00:00',
            'alamat' =>  '-'
        ]);
    }
}
