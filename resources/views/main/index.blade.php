@extends('main')

@section('title', 'Page by default')

@section('sidebar')
        <!--can add sidebar section -->
@stop


@section('content')



    <a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a><br>
    <a href="{{ action('Auth\AuthController@getRegister') }}">Register</a><br>
    <?php
    if(!isset(Auth::user()->id)){
    ?>
    <a href="{{ action('Auth\AuthController@getLogin') }}">Login</a><br>
    <?php
    } else {
    ?>
    <p style="color: rgba(49, 54, 255, 1)">You have login</p>
    <?php
    }
    ?>
    <a href=""></a><br>
    <a href=""></a><br>


    <!-- Display Validation Errors -->
    @include('common.errors')
            <!--User information -->
    @if(Session::has('user-info'))
        <div class="alert-box success">
            <h2>{{ Session::get('user-info') }}</h2>
        </div>
    @endif
                <!--End user information -->

    <div class="container-fluid">
        <div class="col-xs-12">
            <div ng-app="myApp" style="float: none;margin: 0 auto" class="col-xs-6">
                <div ng-controller="FilterController">
                    <div>
                        All entries:
                        <span ng-repeat="entry in array">@{{entry.name}} </span>
                    </div>
                    <div>
                        Entries that contain an "a":
                        <span ng-repeat="entry in filteredArray">@{{entry.name}} </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
