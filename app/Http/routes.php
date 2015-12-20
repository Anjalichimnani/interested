<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'EventController@getEvents');

//Routes for Events
//Route::get('/', 'EventController@getEvents');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/event/create', 'EventController@getCreateEvent');
    Route::post('/event/create', 'EventController@postCreateEvent');

    Route::get('/event/update/{id}', 'EventController@getUpdateEvent');
    Route::post('/event/update', 'EventController@postUpdateEvent');

    Route::get('/event/delete/{id}', 'EventController@getDeleteEvent');


    Route::get('/organizers', 'EventController@getOrganizers');
    Route::get('/users', 'UserController@getUsers');

    Route::post('/interested','EventController@postInterested');
    Route::get('/interests','EventController@getInterests');
});
//Routes for Authentication

# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});


Route::get('/practice',function () {

    Debugbar::info('Hello');
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    echo App::environment();
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Practise
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

//Drop Database interested
if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database interested');
        DB::statement('CREATE database interested');

        return 'Dropped interested; created interested.';
    });

};
