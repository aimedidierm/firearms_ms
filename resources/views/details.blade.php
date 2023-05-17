@extends('layout')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Appplication details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Get your application details</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="wizard" class="form_wizard wizard_horizontal">

                            <div class="row" style="display: block;">
                                <div class="x_panel">
                                    <div class="x_content">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                </tr>
                                            </thead>
                                            @if ($data == null)
                                            <tbody>
                                                <tr>
                                                    <th colspan="3">The application not found</th>
                                                </tr>
                                            </tbody>
                                            @else
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Names</td>
                                                    <td>{{$data->applicants->names}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Emmail</td>
                                                    <td>{{$data->applicants->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Phone</td>
                                                    <td>{{$data->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Date of birth</td>
                                                    <td>{{$data->birth}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Gender</td>
                                                    <td>{{$data->sex}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Status</td>
                                                    <td>{{$data->materialStatus}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Country</td>
                                                    <td>{{$data->country}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>Province</td>
                                                    <td>{{$data->province}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td>District</td>
                                                    <td>{{$data->district}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>Sector</td>
                                                    <td>{{$data->sector}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td>Cell</td>
                                                    <td>{{$data->cell}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td>Village</td>
                                                    <td>{{$data->village}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td>Personal status</td>
                                                    <td>{{$data->personStatus}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td>Rank</td>
                                                    <td>{{$data->rank}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">15</th>
                                                    <td>National ID number</td>
                                                    <td>{{$data->NID}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">16</th>
                                                    <td>Firearms Type</td>
                                                    <td>{{$data->FirearmsType}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">17</th>
                                                    <td>Comment</td>
                                                    <td>{{$data->comment}}</td>
                                                </tr>
                                            </tbody>
                                            @endif
                                        </table>

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
</div>

@stop