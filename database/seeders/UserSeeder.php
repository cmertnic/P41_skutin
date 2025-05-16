<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'firstname'=> 'admin',
                    'middlename'=> '',
                    'lastname'=> '',
                    'email'=> 'Admin@yandex.ru',
                    'login'=> 'administrator',
                    'password'=> Hash::make('administrator'),
                    'tel'=> '880045645646',
                    'role'=> 'admin',
                    
                ],
            ]
        );
    }
}
