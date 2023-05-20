@extends('layout')

@section('content')
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
                        <h2>{{$training->title}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">

                            <div class="row" style="display: block;">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <div class="col-md-12 mx-auto">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <video class="embed-responsive-item" controls>
                                                    <source src="{{$training->video}}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <p>{{$training->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop