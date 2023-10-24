<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$admin = new User;
        //$admin->username = "Felix";
        //$admin->email = "admin@ca1example.com";
        //$admin->password = "secret123";
        //$admin->save();

        //public function run(){
        //    $user1 = new User
        //    $user1->username = "sample";
        //    $user1->email = "email";
        //    $user1->password = "secret";
        //}

        $user1 = new User;
        $user1->username = "sample";
        $user1->email = "email";
        $user1->password = "secret";
        $user1->save();
    }
}
