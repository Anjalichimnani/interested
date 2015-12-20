@extends('layouts.master')

@section('content')

    @if(sizeof($events) == 0)
        There are no Events you are interested in currently. You can Mark One <a href='/'>Here</a>
    @else
        @foreach($events as $event)

                <div>
                    <h2>{{ $event->name }}</h2>

                    <img src='{{ $event->image_url }}' width='150px' height='50px'>
                    <h3>{{ $event->description }}</h3>

                    <table width="100%">
                        <tr>
                            <td width="50%">
                                <label for="link" class="col-lg-3 control-label">Link</label>
                                <a class="col-lg-8" href='http://{{ $event->link }}'>{{ $event->link }}</a>
                            </td>
                            <td width="50%">
                                <label for="amount" class="col-lg-3 control-label">Amount</label>
                                <p class="col-lg-8">{{ $event->amount }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <label for="date_time_on" class="col-lg-3 control-label">On</label>
                                <p class="col-lg-8">{{ $event->date_on }} {{ $event->time_at }}</p>
                            </td>
                            <td width="50%">
                                <label for="venue" class="col-lg-3 control-label">Venue</label>
                                <p class="col-lg-8">{{ $event->venue }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <label for="presenter" class="col-lg-3 control-label">Presenter</label>
                                <p class="col-lg-8">{{ $event->presenter }}</p>
                            </td>
                            <td width="50%">
                                <label for="organizer" class="col-lg-3 control-label">Organizer</label>
                                <p class="col-lg-8">{{ $event->user->name }} -> {{ $event->user->email }}</p>
                            </td>
                        </tr>
                    </table>

                    <hr>

                </div>
        @endforeach
    @endif

@stop
