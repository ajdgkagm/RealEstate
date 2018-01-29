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

{{--            <div class="col-md-8 col-md-offset-2">
                <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>--}}

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
                        <p><a href="{{ route('user.edit', auth()->id()) }}" class="btn btn-default">Edit Profile</a></p>
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

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Public Messages</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th colspan="4">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($strangers as $stranger_msg)
                                    <tr>
                                        <td>{{ $stranger_msg->name }}</td>
                                        <td>{{ $stranger_msg->email }}</td>
                                        <td>
                                            <a href="{{ route('message.show', [$stranger_msg->id]) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('message.archive', [$stranger_msg->id]) }}" class="btn btn-danger btn-sm">Archive</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if($users)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th colspan="4">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                {{--<a href="#" class="btn btn-danger btn-sm">Delete</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
