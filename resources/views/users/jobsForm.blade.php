@extends('layouts.master')
@section('scripts')

    <script>

        function saveJob(){
            let form=document.forms.namedItem("my_form") ;
            let data=new FormData(form);
            let url="{{url('jobs/store')}}";
            $.ajax({
                url: url,
                data: data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    alert('Success!');

                    @if(Auth::user()->hasRole("superadministrator"))
                        location.href="{{url('users/records')}}";
                        @else
                    location.href="{{url('/jobs/read')}}";
                    @endif
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
                        <h1> Create Job</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        Add job
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">WorkDone <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" id="workDone" required="required" name="workDone" class="form-control col-md-7 col-xs-12">{{old('workDone')}} </textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="date" name="date" required="required" value="{{old('date')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Duration (Minutes) <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" min="0" id="duration" name="duration" value="{{old('duration')}}" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="button" onclick=" saveJob()" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>




                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
us
