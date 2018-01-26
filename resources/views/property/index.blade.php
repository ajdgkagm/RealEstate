@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4" >
                <div class="thumbnail" style="border-bottom: 3px red solid;">
                    <a href="{{ route('property.profile') }}">
                    <img src="{{ asset('images/index2.svg') }}" alt="an image">
                    </a>
                    <div class="caption">
                        <h3>₱3.95M</h3>
                        <hr>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><i class="fa fa-bed fa-2x"></i> <span style="color:black; font-weight: 600;">4 Br</span></p>
                            </div>
                            <div class="col-xs-3">
                                <p><i class="fa fa-bath fa-2x"></i> <span style="color:black; font-weight: 600;">2 Ba</span></p>
                            </div>
                            <div class="col-xs-5">
                                <p><i class="icon-ruler fa-2x"></i> <span style="color:black; font-weight: 600;">2,500 SQFT</span></p>
                            </div>
                        </div>
                        <p class="text-muted" style="font-size: 12px">B3 L4 Bluegrass 1A, Darasa, Tan., Bats.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
