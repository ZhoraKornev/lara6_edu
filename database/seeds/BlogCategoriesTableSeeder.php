<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категории';
        $categories [] = [
            'slug' => str_slug($cName),
            'title' => $cName,
            'parent_id' => 0,
            'created_at' => now(),
        ];

        for ($i = 1; $i <= 10; $i++) {
            $cName = 'Категория №' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;
            $categories [] = [
                'slug' => str_slug($cName),
                'title' => $cName,
                'parent_id' => $parentId, 'created_at' => now(),
            ];
        }
        DB::table('blog_categories')->insert($categories);
    }
}
