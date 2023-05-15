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
                    <div class="x_title">
                        <h2>Your application roadmap</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                @if ($data->status == "none" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "send" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "rApproved" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Waiting for psychiatric<br />
                                            <small>Application send to psychiatric to be approved</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "pApproved" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Waiting for psychiatric<br />
                                            <small>Application send to psychiatric to be approved</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            You can start trainings<br />
                                            <small>When you finish training you can do exam</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "trainingPassed" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Waiting for psychiatric<br />
                                            <small>Application send to psychiatric to be approved</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            You can start trainings<br />
                                            <small>When you finish training you can do exam</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Training finished<br />
                                            <small>You can wait to start an exam</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "examPassed" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Waiting for psychiatric<br />
                                            <small>Application send to psychiatric to be approved</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            You can start trainings<br />
                                            <small>When you finish training you can do exam</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Training finished<br />
                                            <small>You can wait to start an exam</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Exam passed<br />
                                            <small>You pass exam wait for office of register to approve your
                                                application</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->status == "approved" && $data->rejected == false)
                                <li>
                                    <a>
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            No application<br />
                                            <small>You didn't send your application yet</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Application sent<br />
                                            <small>Waiting for firearms register to approve</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Waiting for psychiatric<br />
                                            <small>Application send to psychiatric to be approved</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            You can start trainings<br />
                                            <small>When you finish training you can do exam</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Training finished<br />
                                            <small>You can wait to start an exam</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">5</span>
                                        <span class="step_descr">
                                            Exam passed<br />
                                            <small>You pass exam wait for office of register to approve your
                                                application</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="step_no">6</span>
                                        <span class="step_descr">
                                            Your application finished<br />
                                            <small>Your application had been approved</small>
                                        </span>
                                    </a>
                                </li>
                                @elseif($data->rejected == true)
                                <div class="col-md-12 col-sm-12 btn btn-danger">
                                    Your applicaation had been rejeced by
                                    @if ($data->status == "send")
                                    {{"Register"}}
                                    @elseif ($data->status == "rApproved")
                                    {{"Psychiatric"}}
                                    @elseif ($data->status == "pApproved")
                                    {{"Fail in training"}}
                                    @elseif ($data->status == "trainingPassed")
                                    {{"Fail in exam"}}
                                    @else
                                    {{"Unknown"}}
                                    @endif
                                </div>
                                @endif
                            </ul>

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