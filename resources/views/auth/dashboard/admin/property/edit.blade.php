@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(session('msg'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Message:</strong> {{ session('msg') }}
            </div>
        @endif


        <div class="col-md-12">
            {{ Form::model($property, ['route' => ['property.edit', $property->id], 'enctype' => 'multipart/form-data']) }}
            <legend>Edit Property</legend>

            <div class="row" style="max-height: 350px; overflow: hidden;">
                <div class="container-overlay">
                    <a href="https://trezoro.co">
                        <img src="{{ asset('images/property/' . $property->firstImage()->file_name) }}"
                             alt="an image"
                             class="image">
                        <div class="overlay">
                            <p>Entire element is the link here</p>
                        </div>
                    </a>
                </div>

               {{-- <a href="#">
                    <img style="height: 344px; width: 442px; float:left; margin-right: 3px" src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
                </a>--}}
                @foreach($property->images as $ind=>$image)
                    @if($image->file_name !== $property->firstImage()->file_name)
                        <div class="container-overlay-sm">
                            <img src="{{ asset('images/property/' . $image->file_name) }}"
                                 alt="an image"
                                 class="image">
                            <div class="overlay-sm">
                                <a href="#">
                                    <p>Only the text is a link </p>
                                </a>
                            </div>
                        </div>
                    @endif

                @endforeach


            </div>

            <hr>

            <div class="form-group">
                <label for="images">add images</label>
                <input type="file" name="images[]" id="images" multiple>
            </div>

            {{ Form::bsText('caption') }}
            {{ Form::bsText('location') }}

            <div class="col-md-2">
                {{ Form::bsNumber('price') }}
            </div>
            <div class="col-md-2">
                {{ Form::bsNumber('beds') }}
            </div>
            <div class="col-md-2">
                {{ Form::bsNumber('bath') }}
            </div>
            <div class="col-md-2">
                {{ Form::bsNumber('sqft') }}
            </div>
            <div class="col-md-2">
                {{ Form::bsNumber('sqftPrice') }}
            </div>
            <div class="col-md-2">
                {{ Form::bsDate('built') }}
            </div>

                <div class="clearfix"></div>

                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
