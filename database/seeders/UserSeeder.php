<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'age' =>'1989-01-01',
            'address'=>'Aleppo-Syria',
            'phone' => '+963 234 176 195',
            'password' => Hash::make('User1123'),
            'role_as' => '0',
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'age' =>'1980-01-01',
            'address'=>'Latakia-Syria',
            'phone' => '+963 725 128 295',
            'password' => Hash::make('User2123'),
            'role_as' => '0',
        ]);
    }
}
