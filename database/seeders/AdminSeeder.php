<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Asala',
            'email' => 'almasryasala4@gmail.com',
            'age' =>'2002-01-01',
            'address'=>'Homs-Syria',
            'phone' => '+963 938 033 673',
            'password' => Hash::make('AdminAsala123'),
            'role_as' => '1',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'age' =>'2000-01-01',
            'address'=>'Damascus-Syria',
            'phone' => '+963 763 124 324',
            'password' => Hash::make('AdminAdmin123'),
            'role_as' => '1',
        ]);


    }
}
