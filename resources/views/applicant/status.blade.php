@extends('layout')

@section('content')
<x-applicant-nav />
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Your application status</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <!-- Tabs -->
                        <div id="wizard_verticle" class="form_wizard wizard_verticle">
                            <ul class="list-unstyled wizard_steps">
                                <li>
                                    <a href="#step-11">
                                        <span class="step_no">1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-22">
                                        <span class="step_no">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-33">
                                        <span class="step_no">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-44">
                                        <span class="step_no">4</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-55">
                                        <span class="step_no">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-66">
                                        <span class="step_no">6</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-77">
                                        <span class="step_no">7</span>
                                    </a>
                                </li>
                            </ul>

                            <div id="step-11">
                                <h2 class="StepTitle">Step 1</h2>
                                <form class="form-horizontal form-label-left">

                                    <span class="section">Fill your application form</span>

                                </form>
                            </div>
                        </div>
                        <!-- End SmartWizard Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@stop