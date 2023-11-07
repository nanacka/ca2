<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $post1 = new Post;
        $post1->title = "sample";
        $post1->description = "hello";
        $post1->user_id= 1;
        $post1->date_created = "2000/10/10";
        $post1->save();

        $post2 = new Post;
        $post2->title = "BBBBBBBBBBB";
        $post2->description = "hello";
        $post2->user_id= 2;
        $post2->date_created = "2000/10/10";
        $post2->save();

        $post3 = new Post;
        $post3->title = "CCCCCCCCC";
        $post3->description = "hello";
        $post3->user_id= 3;
        $post3->date_created = "2000/10/10";
        $post3->save();

        $post4 = new Post;
        $post4->title = "DDDDDDD";
        $post4->description = "hello";
        $post4->user_id= 4;
        $post4->date_created = "2000/10/10";
        $post4->save();

        $post5 = new Post;
        $post5->title = "EEEEEEEEEEEEE";
        $post5->description = "hello";
        $post5->user_id= 5;
        $post5->date_created = "2000/10/10";
        $post5->save();
    }
}
