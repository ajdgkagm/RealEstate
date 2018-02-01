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

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
            @endforeach
        @endif

        <div class="col-md-12">

            <legend>Edit Property</legend>

            <div class="row" style="max-height: 350px; overflow: hidden;">
                <div class="container-overlay">
                        <img src="{{ asset('images/property/' . $property->firstImage()->file_name) }}"
                             alt="an image"
                             class="image">
                        <div class="overlay">
                            <p>
                                <a href="{{ route('image.edit', ['image' => $property->firstImage()->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('image.destroy') }}" class="btn btn-danger"
                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-image').submit();">
                                    Delete
                                </a>
                            </p>
                                <form id="delete-image" action="{{ route('image.destroy') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $property->firstImage()->id }}">
                                </form>

                        </div>
                </div>

                {{--reduce database query (N + 1) --}}
                @php
                 $firstImage = $property->firstImage()->file_name
                @endphp

                {{--MAP--}}
                <div class="container-overlay-sm">
                    {!! Mapper::render() !!}
                    <div class="overlay-sm">
                        <p><a href="#coordinates" class="btn btn-primary" title="Edit coordinates">Edit</a></p>
                    </div>
                </div>
                {{--./MAP--}}

                @foreach($property->images as $ind=>$image)
                    @if($image->file_name !== $firstImage)
                        <div class="container-overlay-sm">
                            <img src="{{ asset('images/property/' . $image->file_name) }}"
                                 alt="an image"
                                 class="image">
                            <div class="overlay-sm">
                                <p>
                                    <a href="{{ route('image.edit', ['image' => $image->id]) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('image.destroy') }}" class="btn btn-danger"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-image-{{ $image->id }}').submit();">
                                        Delete
                                    </a>
                                </p>
                                <form id="delete-image-{{ $image->id }}" action="{{ route('image.destroy') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $image->id }}">
                                </form>

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
            <hr>
            {{ Form::model($property, ['route' => ['property.update', $property->id], 'files' => true]) }}
            <div class="form-group">
                <label for="images">add images</label>
                <input type="file" name="images[]" id="images" multiple>
            </div>

            {{ Form::bsText('caption') }}
            {{ Form::bsText('location') }}

            <div class="col-md-4">
                {{ Form::bsText('coordinates') }}
            </div>
            <div class="col-md-3">
                {{ Form::bsNumber('price') }}
            </div>
            <div class="col-md-3">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    @if(old('type') !== null)
                        <option value="{{ old('type') }}">{{ old('type') }}</option>
                    @else
                        @foreach($types as $type)
                            <option value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                        @endforeach
                    @endif
                </select>
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
