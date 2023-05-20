@extends('layout')

@section('content')
<x-register-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Trainings</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Trainings management</h2>
                        @if($errors->any())<span style="color: red;"> {{$errors->first()}}</span>@endif
                        @csrf
                        <button type="button" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-success offset-md-9">Create</button>
                        <div class="clearfix"></div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create new training</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/register/training" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label>Title:</label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter Title" required><br>
                                            <label>Description:</label>
                                            <input type="text" name="description" class="form-control" required
                                                style="height: 100px;"><br>
                                            <label>Video:</label>
                                            <input type="file" name="video"><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" value="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Descrption</th>
                                                <th></th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @if ($data->isEmpty())
                                            <td colspan="3"> No data in table </td>
                                            @endif
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    <a href="/training/{{$item->id}}"
                                                        class="btn btn-success">Details</a>
                                                    <a href="/register/training/{{$item->id}}"
                                                        class="btn btn-danger">Delete</a>
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