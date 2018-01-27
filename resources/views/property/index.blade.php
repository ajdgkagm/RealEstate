@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($properties as $property)
            <div class="col-sm-6 col-md-4" >
                <div class="thumbnail" style="border-bottom: 3px red solid;">
                    <a href="{{ route('property.profile') }}">
                    <img src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
                    </a>
                    <div class="caption">
                        <h3>₱{{ $property->price }}M</h3>
                        <hr>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><i class="fa fa-bed fa-2x"></i> <span style="color:black; font-weight: 600;">{{ $property->bed }} Br</span></p>
                            </div>
                            <div class="col-xs-3">
                                <p><i class="fa fa-bath fa-2x"></i> <span style="color:black; font-weight: 600;">{{ $property->bath }} Ba</span></p>
                            </div>
                            <div class="col-xs-5">
                                <p><i class="icon-ruler fa-2x"></i> <span style="color:black; font-weight: 600;">{{ $property->sqft }} SQFT</span></p>
                            </div>
                        </div>
                        <p class="text-muted" style="font-size: 12px">{{ $property->location }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
