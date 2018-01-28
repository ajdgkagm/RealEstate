@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    @if($message)
                    <div class="panel-heading">{{ $message->name }}</div>

                    <p class="h4">Email: <small>{{ $message->email }}</small></p>
                    <p class="h4">Contact: <small>{{ $message->contact }}</small></p>

                    <p class="h4">Message: <small>{{ $message->content }}</small></p>

                    <br>
                    @else
                        <p class="h2 text-warning">Nothing Here</p>
                    @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
