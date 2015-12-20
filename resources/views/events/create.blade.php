@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/event/create' class="form-horizontal">

        {!! csrf_field() !!}

                <div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Event Name:</label>
                        <input type='text' id='name' name='name' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Description:</label>
                        <textarea id='description' name='description' class="col-lg-4" rows="4"></textarea>
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Image URL:</label>
                        <input type='text' id='image_url' name='image_url' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Link:</label>
                            <input type='text' id='link' name='link' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Amount:</label>
                        <input type='text' id='amount' name='amount' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Date On:</label>
                        <input type='text' id='date_on' name='date_on' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Time at:</label>
                        <input type='text' id='time_at' name='time_at' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Venue:</label>
                        <textarea id='venue' name='venue' class="col-lg-4" rows="4"></textarea>
                    </div>

                    <div class='form-group'>
                        <label class="col-lg-2 control-label">Presenter:</label>
                        <input type='text' id='presenter' name='presenter' value='' class="col-lg-4">
                    </div>

                    <div class='form-group'>
                        <label for='tags'  class="col-lg-offset-1 checkbox">Tags</label>
                        @foreach($tags_for_events as $tag_id => $tag)
                            <input type='checkbox' name='tags[]' value='{{$tag_id}}' class="col-lg-4"> {{ $tag['name'] }}<br>
                        @endforeach
                    </div>

                </div>

                <br/>
                <button type="submit" class="btn btn-primary col-lg-offset-1">Save</button>
                <button type="reset" class="btn btn-default col-lg-offset-1">Cancel</button>
            </form>

@stop
