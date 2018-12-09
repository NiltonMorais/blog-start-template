<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $categories */
        $categories = \App\Models\Category::all();

        factory(\App\Models\Post::class, 50)
            ->create()
            ->each(function(\App\Models\Post $post) use($categories){
                $categoriesAttach = $categories->random(2);
                $post->categories()->sync($categoriesAttach);
            });
    }
}
