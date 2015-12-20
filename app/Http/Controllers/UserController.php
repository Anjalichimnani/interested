<?php

namespace Interested\Http\Controllers;

use Interested\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should ha  ppen before any of the other actions
    }

    /**
    * Responds to requests to GET /events
    */
    public function getUsers() {

        $users = \Interested\User::orderBy('name','asc')->get();

        return view('users.profile')->with('users',$users);
    }


}

?>
