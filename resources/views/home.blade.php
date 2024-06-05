@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-image: url('https://wallpapers.com/images/hd/blue-water-background-jwzfz4686jsv7rrm.jpg'); background-size: cover; background-position: center; background-contrast: medium; height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to the Water Quality Monitoring System! This dashboard provides real-time insights into the health of your water supply.') }}
                
                   <div class="row col-4 text-center">
                    <a href="{{route('display')}}" class="btn btn-primary text-center">Get started</a>                   
                </div> 
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
