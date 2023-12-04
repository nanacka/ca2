<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //$post1 = new Post;
        //$post1->title = "sample";
        //$post1->description = "hello";
        //$post1->user_id= 1;
        //$post1->date_created = "2000/10/10";
        //$post1->save();

//

        //$post5 = new Post;
        //$post5->title = "EEEEEEEEEEEEE";
        //$post5->description = "hello";
        //$post5->user_id= 5;
        //$post5->date_created = "2000/10/10";
        //$post5->save();

        // Post::factory()->time(50)->create();

        $numOfTag = 3;
        User::factory()->times(3)->create();


        foreach(Post::all() as $post){
            $tag = User::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->tag()->attach($tag);
        }
    }
}
