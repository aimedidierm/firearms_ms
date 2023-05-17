@extends('layout')

@section('content')
<x-applicant-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Appplication form</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Your application is in process</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">

                            <div class="col-md-12 col-sm-12 btn btn-danger">
                                Thank you for sending application, you can't send another application while anotherstill
                                in procees.
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