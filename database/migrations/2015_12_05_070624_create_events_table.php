<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

        # Increments method will make a Primary, Auto-Incrementing field.
        # Most tables start off this way
        $table->increments('id');

        # This generates two columns: `created_at` and `updated_at` to
        # keep track of changes to a row
        $table->timestamps();

        # The rest of the fields...
        $table->string('name');
        $table->text('description');
        $table->string('image_url');
        $table->string('link');
        $table->string('presenter');
        $table->date('date_on');
        $table->time('time_at');
        $table->text('venue');
        $table->decimal('amount');

        //Connection to Users
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');

        # FYI: We're skipping the 'tags' field for now; more on that later.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
