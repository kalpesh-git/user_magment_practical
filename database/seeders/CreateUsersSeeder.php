<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'first_name'=>'Admin',
               'last_name'=>'user',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> Hash::make('123456'),//bcrypt('123456'),
               'status'=> "enable"
            ], 
            [
               'first_name'=>'kalpesh',
               'last_name'=>'morker',
               'email'=>'kalpesh@gmail.com',
               'type'=>0,
               'password'=> Hash::make('123456'),
               'status'=> "enable"
            ],
            [
                'first_name'=>'hayaan',
                'last_name'=>'patel',
                'email'=>'hayaan@gmail.com',
                'type'=>0,
                'password'=> Hash::make('123456'),
                'status'=> "enable"
             ],
             [
                'first_name'=>'alex',
                'last_name'=>'parker',
                'email'=>'alex@gmail.com',
                'type'=>0,
                'password'=> Hash::make('123456'),
                'status'=> "enable"
             ],
             [
                'first_name'=>'rayan',
                'last_name'=>'brain',
                'email'=>'rayan@gmail.com',
                'type'=>0,
                'password'=> Hash::make('123456'),
                'status'=> "enable"
             ],
        ];
        
        User::truncate();
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
