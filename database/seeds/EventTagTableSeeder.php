<?php

use Illuminate\Database\Seeder;

class EventTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events =[
           'Intermediate Excel Tips & Tricks' => ['Education','Technology','Conference'],
           'Volunteer Night at Partners In Health' => ['Health','Education','Social','Support'],
           'State of Student Privacy' => ['Education','Support','Life','Conference']
       ];

       # Now loop through the above array, creating a new pivot for each book to tag
       foreach($events as $name => $tags) {

           # First get the book
           $event = \Interested\Event::where('name','like',$name)->first();

           # Now loop through each tag for this book, adding the pivot
           foreach($tags as $tagName) {
               $tag = \Interested\Tag::where('name','like',$tagName)->first();

               # Connect this tag to this book
               $event->tags()->save($tag);
           }

       }
    }
}
