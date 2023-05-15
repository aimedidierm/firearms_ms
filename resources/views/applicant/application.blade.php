@extends('layout')

@section('content')
<x-applicant-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Application form</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>You can fill below details to start your application</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="#" method="post">
                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" value="{{$data->names}}"
                                    placeholder="Names" disabled>
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="email" class="form-control has-feedback-left" value="{{$data->email}}"
                                    placeholder="Email" disabled>
                                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            </div>

                            <div class="col-md-6 col-sm-6  form-group has-feedback">
                                <input type="tel" class="form-control" id="inputSuccess5" placeholder="Phone"
                                    value="{{$data->phone}}" required="required">
                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 ">Date Of Birth <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 ">
                                    <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text"
                                        required="required" type="text" onfocus="this.type='date'"
                                        onmouseover="this.type='date'" onclick="this.type='date'"
                                        onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function () {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 ">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="male" class="join-btn">
                                        &nbsp; Male &nbsp;
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary"
                                        data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="female" class="join-btn"> Female
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" value="Rwanda" class="form-control" disabled>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="Province" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="District" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="Sector" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="Cell" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="Village" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Civilian</option>
                                    <option>Police</option>
                                    <option>Soldier</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="Rank" class="form-control" required="required">
                            </div>
                            <div class="col-md-3 col-sm-12  form-group">
                                <input type="text" placeholder="National ID number" class="form-control"
                                    required="required">
                            </div>
                            <div class="col-md-3 col-sm-3 ">
                                <select class="form-control">
                                    <option>Ak-47</option>
                                    <option>RPG</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12  form-group">
                                <input type="text" placeholder="Why you need firearm?" style="height:240px"
                                    class="form-control" required="required">
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-9">
                                    <button type="submit" class="btn btn-success">Submit your application</button>
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