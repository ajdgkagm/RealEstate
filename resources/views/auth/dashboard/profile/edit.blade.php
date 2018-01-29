@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(session('msg'))
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Message: </strong> {{ session('msg') }}
                    </div>
                </div>
            @endif

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

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Profile</div>

                    <div class="panel-body">
                        {{--{{ Form::model($user, ['route' => ['user.update', $user->id]]) }}--}}
                        {!! Form::open(['route' => ['user.update', $user->id]]) !!}
                        <div class="col-md-12">
                            {{ Form::bsText('name', $user->name) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::bsEmail('email', null, ['placeholder' => $user->email]) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::bsPassword('password', null, ['placeholder' => 'Leave Blank If Same as Old']) }}
                        </div>
                        <div class="col-md-12">
                            {{ Form::bsPassword('password_confirmation', null) }}
                        </div>

                        <div class="col-md-4 col-md-offset-8">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <br>
                </div>
            </div>
        </div>

    </div>
@endsection
