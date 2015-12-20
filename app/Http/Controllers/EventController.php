<?php

namespace Interested\Http\Controllers;

use Interested\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller {

    public function __construct() {
        # Put anything here that should ha  ppen before any of the other actions
    }

    /**
    * Responds to requests to GET /events
    */
    public function getEvents() {

        $events = \Interested\Event::orderBy('updated_at','desc')->with('user')->get();

        $eventsForCheckboxes = [];
        $user = new \Interested\User();

        if(\Auth::Check()) {
            $eventsForCheckboxes = $user->getEventsForCheckboxes();
        }

        return view('events.index')->with([
            'events'=>$events,
            'eventsForCheckboxes'=>$eventsForCheckboxes,
        ]);

    }

    public function getCreateEvent() {

        $tags = new \Interested\Tag();
        $tags_for_events = $tags->getTagsForCheckboxes();

        return view('events.create')->with('tags_for_events',$tags_for_events);
    }

    public function postCreateEvent(Request $request) {

        $event = new \Interested\Event;

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
            'link' => 'required|url',
            'amount' => 'required|numeric',
            'date_on' => 'required|date',
            'time_at' => 'required',
            'venue' => 'required',
            'presenter' => 'required|string',
        ]);


        $event->name = $request->name;
        $event->description = $request->description;
        $event->image_url = $request->image_url;
        $event->link = $request->link;
        $event->amount = $request->amount;
        $event->date_on = $request->date_on;
        $event->time_at = $request->time_at;
        $event->venue = $request->venue;
        $event->presenter = $request->presenter;
        $event->user_id = \Auth::id();

        $event->save();

        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }

        $event->tags()->sync($tags);

        \Session::flash('flash_message','Your Event was Created.');
        return redirect('\organizers');
    }

    /**
    * Updates the Events
    * Responds to requests to GET /update/event/{id}
    */
    public function getUpdateEvent($id) {

        $event_id = \Interested\Event::where('user_id','=',\Auth::id())->with('tags')->find($id);

        if(is_null($event_id)) {

            \Session::flash('flash_message','Event is not present or not owned by the user.');
            return redirect('\organizers');
        }
        else {

            # Get all the possible tags so we can include them with checkboxes in the view
            $tagModel = new \Interested\Tag();
            $tags_for_checkbox = $tagModel->getTagsForCheckboxes();
            /*
            Create a simple array of just the tag names for tags associated with this book;
            will be used in the view to decide which tags should be checked off
            */
            $tags_for_this_event = [];
            foreach($event_id->tags as $tag) {
                $tags_for_this_event[] = $tag->name;
            }
            return view('events.edit')
                ->with([
                    'event' => $event_id,
                    'tags_for_checkbox' => $tags_for_checkbox,
                    'tags_for_this_event' => $tags_for_this_event,
                ]);
            }
    }

    /**
    * Updates the Events
    * Responds to requests to GET /update/event/{id}
    */
    public function postUpdateEvent(Request $request) {

        $event_id = \Interested\Event::find($request->id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
            'link' => 'required|url',
            'amount' => 'required|numeric',
            'date_on' => 'required|date',
            'time_at' => 'required',
            'venue' => 'required',
            'presenter' => 'required|string',
        ]);

        $event_id->name = $request->name;
        $event_id->description = $request->description;
        $event_id->image_url = $request->image_url;
        $event_id->link = $request->link;
        $event_id->amount = $request->amount;
        $event_id->date_on = $request->date_on;
        $event_id->time_at = $request->time_at;
        $event_id->venue = $request->venue;
        $event_id->presenter = $request->presenter;

        $event_id->save();

        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $event_id->tags()->sync($tags);

        \Session::flash('flash_message','Your Event Was updated.');
        return redirect('/organizers');
    }

    /**
    * Deletes the Event
    * Responds to requests to GET /delete/event/{id}
    */
    public function getDeleteEvent($id) {

        $event_id = \Interested\Event::find($id);

        if($event_id) {

            if($event_id->tags()) {
                $event_id->tags()->detach();
            }

            if($event_id->interested_users()) {
                $event_id->interested_users()->detach();
            }

            $event_id->delete();

            \Session::flash('flash_message','Your Event Was deleted.');
            return redirect('/organizers');
        }
        else {
            \Session::flash('flash_message','Your Event Was not Found.');
            return redirect('/organizers');
        }
    }

    public function getOrganizers() {

        $events = \Interested\Event::where('user_id','=',\Auth::id())->orderby('updated_at','desc')->with('tags')->get();

        return view('events.organizer')->with('events',$events);
    }

    public function postInterested(Request $request) {

        $user = \Auth::user();
        $events_for_users = $user->interested_events;
        $events_for_users_id = [];

        foreach($events_for_users as $event)
            array_push ($events_for_users_id,$event->id);

        if($request->interested == 'interested')
        {
            array_push($events_for_users_id,(int) $request->id);
        }
        else {
            $index = array_search((int)$request->id, $events_for_users_id);
            unset($events_for_users_id[$index]);
        }

        $user->interested_events()->sync($events_for_users_id);

        \Session::flash('flash_message','Your Interests are Incorporated :).');
        return redirect('/');
    }

    public function getInterests(Request $request) {

        $user = \Auth::user();
        $events_for_users = $user->interested_events;

        return view('events.interest')->with('events',$events_for_users);
    }

}

?>
