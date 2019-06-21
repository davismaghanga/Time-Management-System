@extends('layouts.master')
@section('scripts')

    <script>

        function saveUser(){
           let form=document.forms.namedItem("my_form") ;
           let data=new FormData(form);
           let url="{{url('users/store')}}";
            $.ajax({
                url: url,
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    alert('Success!');
                    location.href="{{url('users/read')}}";
                }
            });

        }

    </script>
@endsection


@section('content')

    <div class="right_col" role="main">
        <div class="">

            <div class="row">
                <div class="col-md-12">
                    <div class="title_left">
                        <h1> Create/ Update User</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Add users
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
                        <form id="demo-form2" name="my_form" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">

                                <input type="hidden" name="id" value="{{old('id')}}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" required="required" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="date" name="email" required="required" value="{{old('email')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="password" name="password" @if (old('id')==null) required="required" @endif class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="button" onclick=" saveUser()" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>




                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
