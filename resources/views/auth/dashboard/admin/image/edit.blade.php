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

            @if(session('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Message:</strong> {{ session('error') }}
                </div>
            @endif

        <div class="col-md-12">
            {!! Form::open(['route' => ['image.update', $image->id], 'files' => true,]) !!}
            <legend>Edit Property Image</legend>
            <input type="hidden" name="imageId" value="{{ $image->id }}">
            @if(env('FILESYSTEM_DRIVER') === null)
                <img style="width: 30%; min-width: 350px;" src="{{ asset('images/property/' . $image->file_name) }}" class="center-block img-responsive" alt="Image">
                @else
                <img style="width: 30%; min-width: 350px;" src="{{ Storage::url('images/property/' . $image->file_name) }}" class="center-block img-responsive" alt="Image">
            @endif

            <hr>

            <div class="form-group col-md-offset-5">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
