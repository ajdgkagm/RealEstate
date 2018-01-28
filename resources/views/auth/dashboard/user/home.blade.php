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

                        You are logged in! as USER
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">My Reservations</div>

                    <div class="panel-body">
                        @if(count($reservations) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Sqft.</th>
                                        <th colspan="5" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $reservation)
                                        <tr>
                                            <td>{{ $reservation->property->location }}</td>
                                            <td>{{ $reservation->property->price }}</td>
                                            <td>{{ $reservation->property->sqft }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('property.profile', [$reservation->property->id]) }}"
                                                   class="btn btn-primary btn-sm">View</a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('property-reserve-{{ $reservation->property->id }}').submit();">
                                                    Remove
                                                </a>
                                                <form id="property-reserve-{{ $reservation->property->id }}"
                                                      action="{{ route('reservation.destroy', [$reservation->property->id]) }}"
                                                      method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <p class="h4">No <a href="{{ route('property.index') }}">reservations</a> yet</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
