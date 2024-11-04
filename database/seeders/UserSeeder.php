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
        $user = New User();
        $user->name = 'kayrhan';
        $user->email = 'roymar14@gmail.com';
        $user->password = Hash::make('admin123');
        $user->telp = '966544592';
        $user->role = 'user';
        $user->save();
    }
}
