@extends('layouts.master')

@section('content')

    <p>Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/login' class="form-horizontal">

        {!! csrf_field() !!}

        <div class='form-group'>
            <label for='email' class="col-lg-2 control-label">Email</label>
            <input type='text' name='email' id='email' value='{{ old('email') }}' class="col-lg-4">
        </div>

        <div class='form-group'>
            <label for='password' class="col-lg-2 control-label">Password</label>
            <input type='password' name='password' id='password' value='{{ old('password') }}' class="col-lg-4">
        </div>

        <div class='form-group'>
            <label for='remember' class="col-lg-2 control-label">Remember me</label>
            <input type='checkbox' name='remember' id='remember'>
        </div>

        <div class="col-lg-12 col-lg-offset-1">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Cancel</button>

        </div>
        <br>

    </form>
@stop
