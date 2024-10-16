<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = New User();
        $user->Name = 'Admin roy';
        $user->email = 'royproject123@gmail.com';
        $user->password = Hash::make('admin123');
        $user->telp = '0895626266695';
        $user->role = 'admin';
        $user->save();
    }
}
