@extends('layouts.master')

@section('content')

    <p>Already have an account? <a href='/login'>Login here...</a></p>

        <h1>Register</h1>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method='POST' action='/register'  class="form-horizontal">
            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='name' class="col-lg-2 control-label">Name</label>
                <input type='text' name='name' id='name' value='{{ old('name') }}' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='email' class="col-lg-2 control-label">Email</label>
                <input type='text' name='email' id='email' value='{{ old('email') }}' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='password' class="col-lg-2 control-label">Password</label>
                <input type='password' name='password' id='password' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='password_confirmation' class="col-lg-2 control-label">Confirm Password</label>
                <input type='password' name='password_confirmation' id='password_confirmation' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='age' class="col-lg-2 control-label">Age</label>
                <input type='text' name='age' id='age' value='{{ old('age') }}' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='address' class="col-lg-2 control-label">Address</label>
                <input type='text' name='address' id='address' value='{{ old('address') }}' class="col-lg-4">
            </div>

            <div class='form-group'>
                <label for='phone_no' class="col-lg-2 control-label">Phone No</label>
                <input type='text' name='phone_no' id='phone_no' value='{{ old('phone_no') }}' class="col-lg-4">
            </div>

            <div class="col-lg-12 col-lg-offset-1">
                <button type='submit' class='btn btn-primary'>Register</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </form>
@stop
