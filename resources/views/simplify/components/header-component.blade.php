<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Countrywide Process</title>
        <link rel="stylesheet" href="{{ asset('design/css/animate.css') }}" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('design/css/icofont.css') }}" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('design/select2/dist/css/select2.min.css') }}" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('design/css/style.css') }}" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>

    <section class="tpnavbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-3">
                </div>
                <div class="col-md-3 text-center d-none d-md-block">
                    <div class="logoicon d-inline-block me-2"><a href="{{ URL::to('/') }}"><img src="{{ asset('design/images/logo-icon-white.png') }}" height="30"></a></div>
                    
                </div>
                <div class="col-6 col-md-6 text-end">
                    <a href="{{ URL::to('add-client') }}" class="registrbtn">Client</a>
                    <a href="{{ URL::to('search-client') }}" class="registrbtn">Search Client</a>
                    <a href="{{ URL::to('search-case') }}" class="registrbtn">Search Case</a>
                </div>
            </div>
        </div>
    </section>