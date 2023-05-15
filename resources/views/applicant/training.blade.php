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
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <a href="/applicant/playlist/1">
                                        <div class=" image view view-first">
                                            <img style="width: 100%; display: block;" src="/images/media.jpg"
                                                alt="image" />
                                            <div class="mask">
                                                <p>Start training</p>
                                            </div>
                                        </div>
                                        <div class="caption">
                                            <p>Training title</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop