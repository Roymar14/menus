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
        $user->Name = 'sibroo';
        $user->email = 'royproject14@gmail.com';
        $user->password = Hash::make('admin14');
        $user->telp = '12345678';
        $user->role = 'user';
        $user->save();
    }
}
