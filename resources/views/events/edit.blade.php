@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/event/update' class="form-horizontal">

        {!! csrf_field() !!}

        <input type='hidden' name='id' value='{{ $event->id }}'>

                <div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Name:</label>
                        <input type='text' id='name' name='name' value='{{ $event->name }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Description:</label>
                        <textarea id='description' name='description' class="col-lg-4" rows="4">{{ $event->description }}</textarea>
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Image URL:</label>
                        <input type='text' id='image_url' name='image_url' value='{{ $event->image_url }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Link:</label>
                        <input type='text' id='link' name='link' value='{{ $event->link }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Amount:</label>
                        <input type='text' id='amount' name='amount' value='{{ $event->amount }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Date On:</label>
                        <input type='text' id='date_on' name='date_on' value='{{ $event->date_on }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Time at:</label>
                        <input type='text' id='time_at' name='time_at' value='{{ $event->time_at }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Venue:</label>
                        <textarea id='venue' name='venue' class="col-lg-4" rows="4">{{ $event->venue }}</textarea>
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Presenter:</label>
                        <input type='text' id='presenter' name='presenter' value='{{ $event->presenter }}' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label for='tags'  class="col-lg-offset-1 checkbox">Tags</label>
                        @foreach($tags_for_checkbox as $tag_id => $tag)
                            <?php $checked = (in_array($tag['name'],$tags_for_this_event)) ? 'CHECKED' : '' ?>
                            <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag_id}}' class="col-lg-4"> {{ $tag['name'] }}<br>
                        @endforeach
                    </div>

                </div>

                <br/>
                <button type="submit" class="btn btn-primary col-lg-offset-1">Save</button>
                <button type="reset" class="btn btn-default col-lg-offset-1">Cancel</button>
            </form>

@stop
