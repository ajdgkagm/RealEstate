@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row" style="max-height: 350px; overflow: hidden;">
            <a href="#">
                <img style="height: 344px; width: 442px; float:left; margin-right: 3px" src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
            </a>
            @foreach($property->images as $ind=>$image)
                @if($image->file_name !== $property->firstImage()->file_name)
                <a href="#">
                    <img style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;" src="{{ asset('images/property/' . $image->file_name) }}" alt="an image" class="hidden-xs {{ $ind > 4 ? 'hidden-sm' : '' }}">
                </a>
                @endif
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <p class="text-center" style="margin-top: 15px">House </p>
        </div>
    </div>
@endsection
