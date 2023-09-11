<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .certificate-card {
            width: 90%;
            margin: 0 auto;
            margin-top: 100px;
        }

        .certificate-card h2 {
            font-size: 70px;
            /* Adjust the font size as needed */
        }

        .certificate-card h4 {
            font-size: 50px;
            /* Adjust the font size as needed */
        }

        .certificate-card p {
            font-size: 30px;
            /* Adjust the font size as needed */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card certificate-card">
                    <div class="card-body text-center">
                        <img src="{{'/images/Rwanda_National_Police.png'}}" alt="" width="200" height="200">
                        <h2>Certificate of Completion</h2>
                        <p>This is to certify that</p>
                        <h4>{{$data->applicant->names}}</h4>
                        <p>has successfully completed the course on</p>
                        <h4>How to use and maintain a gun</h4>
                    </div>

                    <p style="align-items:flex-end"> SN: {{$data->serialNumber}}</p>
                </div>
            </div>
        </div>
        <center>
            <a href="/get/certificate/{{$data->serialNumber}}" class="btn btn-primary mt-4">Download
                Certificate</a>
        </center>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>