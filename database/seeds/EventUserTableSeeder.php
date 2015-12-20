<?php

use Illuminate\Database\Seeder;

class EventUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events =[
           'Intermediate Excel Tips & Tricks' => ['Jill','Jamal'],
           'Volunteer Night at Partners In Health' => ['Jill'],
           'State of Student Privacy' => ['Jill','Jamal'],
       ];

       foreach($events as $name => $users) {

           # First get the book
           $event = \Interested\Event::where('name','like',$name)->first();

           # Now loop through each tag for this book, adding the pivot
           foreach($users as $userName) {
               $user = \Interested\User::where('name','like',$userName)->first();

               # Connect this tag to this book
               $event->interested_users()->save($user);
           }

       }
    }
}
