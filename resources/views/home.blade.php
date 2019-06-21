@extends('layouts.master')

@section('content')
    <div class="right_col"role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">

                <div class="x_content">


                    @permission("create-users")
                    <a role="button" class="btn-primary" href="{{url('users/create')}}">Create users</a>
                    @endpermission

                    @permission("create-tasks")
                    <a role="button" class="btn-primary" href="{{url('jobs/create')}}">Create task</a>

                    @endpermission


                </div>
            </div>
        </div>


    </div>

@endsection
