@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! as ADMIN
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Properties</div>

                <div class="panel-body">
                    <div class="btn-group">
                        <a href="{{ route('property.index') }}" type="button" class="btn btn-primary">View</a>
                        <a href="{{ route('property.create') }}" type="button" class="btn btn-success">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
