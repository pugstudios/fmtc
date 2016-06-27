<!-- Stored in resources/views/child.blade.php -->

@extends('pages.master')

@section('title', 'FMTC Coupon Creator')

@section('content')

<form id="job-search" method='post' action="{{ url('create-coupon') }}">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="row">
        <div class="col-sm-7 col-sm-offset-2">
            <div class="form-group">
                <label class="sr-only" for="search">Full URL of Coupon JSON</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                    <input type="text" class="form-control" id="remoteUrl" name="remoteUrl" placeholder="Full URL of Coupon JSON" value="{{ $remoteUrl  }}">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-default btn-success">SUBMIT</button>
        </div>
    </div>
</form>

<hr/>

@if(isset($couponJSON))
@include('pages.coupon')
@endif

@endsection