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
        //$admin1->name = "Felix";
        //$admin1->email = "admin@ca1example.com";
        //$admin1->password = "secret123";
        //$admin1->save();

        //$admin2 = new User;
        //$admin2->name = "another one";
        //$admin2->email = "sample";
        //$admin2->password = "secret123";
        //$admin2->save();

        //creates 20 random users
        User::factory()->count(20)->create();
    }
}
