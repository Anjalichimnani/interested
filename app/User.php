<?php

namespace Interested;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * Added Custom fields for Users Table
     */
    protected $fillable = ['name', 'email', 'password','age','address','phone_no'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function event() {
        # Users created many Events
        # Define a one-to-many relationship.
        return $this->hasMany('\Interested\Event');
    }

    public function interested_events() {
        # Users created many Events
        # Define a one-to-many relationship.
        return $this->belongsToMany('\Interested\Event')->withTimestamps();
    }

    public function getEventsForCheckboxes() {

        $user_id = \Auth::user();
        $events_of_users[] = $user_id->interested_events->toArray();

        $eventsForCheckboxes = [];

        foreach($events_of_users[0] as $event) {
            $eventsForCheckboxes[$event['id']] = $event['id'];
        }

        return $eventsForCheckboxes;
    }
}
