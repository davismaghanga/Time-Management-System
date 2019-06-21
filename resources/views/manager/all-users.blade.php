@extends('layouts.manager.master')

@section('content')

    <div class="right_col"role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Manager View </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User name</th>
                            <th>Email</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>mark@gmail.com</td>
                            <td><i class="fa fa-trash"></i></td>
                            <td><i class="fa fa-pencil"></i></td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>


@endsection
