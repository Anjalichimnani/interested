<?php

namespace Interested;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function user() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\Interested\User');
    }

    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Interested\Tag')->withTimestamps();
    }

    public function interested_users()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Interested\User')->withTimestamps();
    }

    public function getUsersForCheckboxes() {

        $users = $this->interested_users();

        $usersForCheckboxes = [];

        foreach($users as $user) {
            $usersForCheckboxes[$user['id']] = $user;
        }


    }
}
