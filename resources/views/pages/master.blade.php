<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    </head>
    <body>
        @include('shared.nav')

        <div class="container">

            @include('shared.errors')

            <form id="job-search" method='post' action="{{ url('fetch-json') }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-2">
                        <div class="form-group">
                            <label class="sr-only" for="search">Full URL of Remote JSON</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" id="remoteUrl" name="remoteUrl" placeholder="Full URL of Remote JSON" value="{{ $remoteUrl  }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default btn-success">SUBMIT</button>
                    </div>
                </div>
            </form>

            <hr/>

            @yield('content')

        </div>

        <!-- JS -->
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>