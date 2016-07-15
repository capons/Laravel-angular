@extends('main')

@section('title', 'Register')

@section('sidebar')

@stop

@section('content')


    <div class="row">
        <div style="float:none;margin: 0 auto" class="col-xs-5">


            <form class="form-horizontal" action="{{action('Auth\AuthController@postRegister')}}" method="post">
                <div class="form-group">
                    <label style="text-align: left" class="col-sm-4 control-label">First name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="f_name" >
                    </div>
                </div>
                <div class="form-group">
                    <label style="text-align: left" class="col-sm-4 control-label">Last name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="l_name" >
                    </div>
                </div>

                <div class="form-group">
                    <label style="text-align: left" class="col-sm-4 control-label">Email address</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label style="text-align: left" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div style="text-align: right" class="col-xs-12">
                        <input class="btn btn-default" type="submit" value="SUBMIT">
                    </div>
                </div>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
    <div class="row">
        <div style="float: none;margin: 0 auto" class="col-xs-6">
            <!-- Display Validation Errors -->
            @include('common.errors')
        </div>
    </div>
    <!--User information -->
    @if(Session::has('user-info'))
        <div class="alert-box success">
            <h2>{{ Session::get('user-info') }}</h2>
        </div>
    @endif


@stop