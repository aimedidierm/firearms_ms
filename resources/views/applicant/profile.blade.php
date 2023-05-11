@extends('layout')

@section('content')
<x-applicant-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin profile</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>You can update your details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            action="/applicant" method="POST">
                            @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span> @else @endif
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Names
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="names" value="{{$data->names}}" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="email" value="{{$data->email}}" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">phone
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="phone" value="{{$data->phone}}" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Address
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="address" value="{{$data->address}}" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="firstPassword" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirm
                                    password
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="confirmPassword" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop