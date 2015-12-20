@extends('layouts.master')

@section('content')

        @foreach($users as $user)
                <div>
                    <h2>{{ $user->name }}</h2>
                    <h3>{{ $user->email }}</h3>


                    <hr>

                </div>
        @endforeach

@stop
