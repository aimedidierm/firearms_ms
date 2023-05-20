@extends('layout')

@section('content')
<x-register-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Applicants</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Applicant who are allowed for exam</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th></th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @if ($data->isEmpty())
                                            <td colspan="4"> No data in table </td>
                                            @endif
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->names}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>
                                                    <a href="/details/{{$item->id}}" class="btn btn-success">Details</a>
                                                    <a href="/register/exam/pass/{{$item->id}}"
                                                        class="btn btn-primary">Pass</a>
                                                    <a href="/register/exam/fail/{{$item->id}}"
                                                        class="btn btn-danger">Fail</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop