<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numOfTags = 3;
        Tag::factory()->times(3)->create();

        foreach(Post::all() as $post){
            $tags = Tag::inRandomOrder()->take(rand(1,3))->pluck('id');
            $post->tags()->attach($tags);
        }
    }
}
