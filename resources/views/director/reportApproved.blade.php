<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Firearms management system </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Applicants</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Applicant which had been approved</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Gun Serial number</th>
                                                <th>Category</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @if ($data->isEmpty())
                                            <td colspan="6"> No data in table </td>
                                            @endif
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{$item->updated_at}}</td>
                                                <td>{{$item->names}}</td>
                                                <td>{{$item->serialNumber}}</td>
                                                <td>{{$item->application[0]->FirearmsType}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->address}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p>Done at Kigali, Gasabo at {{ now() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <script src="/jquery/dist/jquery.min.js"></script>
        <script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="s/switchery/dist/switchery.min.js"></script>
        <script src="/js/custom.min.js"></script>
</body>

</html>