<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i= 0; $i < 20; $i++){
            $newPost= new Post();

            $newPost-> title = ($i + 1) . ') Post';
            $newPost-> article = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. ";
            $newPost-> slug = Str::slug ($newPost-> title, ' || ');

            $newPost->save();
        }
    }
}
