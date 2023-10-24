<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $post1 = new User;
        $post1->username = "sample";
        $post1->email = "email";
        $post1->password = "secret";
        $post1->save();
    }
}
