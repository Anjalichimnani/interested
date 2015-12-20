<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Health','Technology','Education','Social','Conference','Sports','Fun','Christmas','Support','Life'];

        foreach ($tags as $tag_name) {
            $tag = new \Interested\Tag();
            $tag->name = $tag_name;
            $tag->save();
        }

    }
}
