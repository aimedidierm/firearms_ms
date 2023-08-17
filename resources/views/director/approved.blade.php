@extends('layout')

@section('content')
<x-director-nav />
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
                        <h2>Applicant which had been approved</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_title">
                        <h2>Title</h2>
                        <a href="/director/report-approved" class="btn btn-primary offset-md-9">Get report</a>
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
                                                <th>Date</th>
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
                                                <td>{{$item->updated_at}}</td>
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