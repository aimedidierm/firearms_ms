@extends('layout')

@section('content')
<x-applicant-nav />
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
                        <h2>Select training</h2>
                        <div class="clearfix"></div>
                        <button type="button" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-danger offset-md-9">Finish all</button>
                        <div class="clearfix"></div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="modal-title">Are you sure, you finished all trainings and you're
                                            ready for exam?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <a href="/applicant/endTraining" class="btn btn-primary">Yes</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            @foreach ($data as $item)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <a href="/applicant/playlist/{{$item->id}}">
                                        <div class=" image view view-first">
                                            <img style="width: 100%; display: block;" src="/images/media.jpg"
                                                alt="image" />
                                            <div class="mask">
                                                <p>Start training</p>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p>{{$item->title}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop