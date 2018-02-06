@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('msg'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Message:</strong> {{ session('msg') }}
                </div>
            @endif

            <div class="col-md-12">
                {!! Form::open(['route' => 'property.store', 'files' => true]) !!}
                <legend>Add Property</legend>

                <div class="form-group">
                    <label for="images">images</label>
                    <input type="file" name="images[]" id="images" multiple>
                </div>

                {{ Form::bsText('caption') }}
                {{ Form::bsText('location') }}

                <div class="col-md-4">
                    {{ Form::bsText('coordinates') }}
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
