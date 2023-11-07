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
        //$admin1 = new User;
        //$admin1->username = "Felix";
        //$admin1->email = "admin@ca1example.com";
        //$admin1->password = "secret123";
        //$admin1->save();

        //$admin2 = new User;
        //$admin2->name = "another one";
        //$admin2->email = "sample";
        //$admin2->password = "secret123";
        //$admin2->save();

        //public function run(){
        //    $user1 = new User
        //    $user1->username = "sample";
        //    $user1->email = "email";
        //    $user1->password = "secret";
        //}

        //$user1 = new User;
        //$user1->username = "sample";
        //$user1->email = "email";
        //$user1->password = "secret";
        //$user1->save();
        User::factory()->count(20)->create();
    }
}
