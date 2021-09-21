<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sport', 'Finanza', 'Gossip', 'Attualità','Top10'];
        foreach ($categories as $category) {
            $newCategory= new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::slug($category, ' || ');
            $newCategory->save();

            
        }
    }
}
