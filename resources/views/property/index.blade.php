@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($properties) === 0)
                <h2 class="text-warning text-center">No Properties Yet</h2>
            @endif
            @foreach($properties as $property)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="border-bottom: 3px red solid;">
                    <a href="{{ route('property.profile', [$property->id]) }}">
                    <img style="width: 100%; height: 100%; max-height: 540px;" src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
                    </a>
                    <div class="caption">
                        <h3>₱{{ $property->price }}M
                            {{--CHECK IF ANY USER IS LOGIN--}}
                            @if(Auth::user())
                                {{--IF USER IS ADMIN--}}
                                @if(Auth::user()->hasRole('admin'))
                                <div class="btn-group pull-right">
                                    <a href="{{  route('property.edit', [$property->id]) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                       onclick="if(confirm('Delete property?') === true) { event.preventDefault();
                                               document.getElementById('delete-property-{{ $property->id }}').submit();}">
                                        Delete
                                    </a>
                                    <form id="delete-property-{{ $property->id }}" action="{{ route('property.destroy') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $property->id }}">
                                    </form>
                                </div>
                                {{--./IF USER IS ADMIN--}}

                                {{--IF USER IS ORDINARY USER--}}
                                    @elseif (Auth::user()->hasRole('user'))
                                <div class="btn-group pull-right">
                                    <a href="{{ route('property.profile', [$property->id]) }}" type="button" class="btn btn-primary btn-sm">View</a>

                                    {{--IF USER HAVE NO RESERVATION FOR THAT PROPERTY--}}
                                    @if(!Auth::user()->hasReservation($property->id))
                                        <a href="#" class="btn btn-success btn-sm"
                                           onclick="event.preventDefault();
                                                   document.getElementById('property-reserve-{{ $property->id }}').submit();">
                                            Reserve
                                        </a>
                                        <form id="property-reserve-{{ $property->id }}" action="{{ route('reservation.store', [$property->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    {{--IF USER ALREADY RESERVE--}}
                                    @else
                                        <a href="#" class="btn btn-warning btn-sm"
                                           onclick="event.preventDefault();
                                                   document.getElementById('property-reserve-{{ $property->id }}').submit();">
                                            Reserved<i class="fa fa-check lg"></i>
                                        </a>
                                        <form id="property-reserve-{{ $property->id }}" action="{{ route('reservation.destroy', [$property->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                </div>
                                @endif
                                {{--./IF USER IS ORDINARY USER--}}
                            @endif
                            {{--CHECK IF ANY USER IS LOGIN--}}
                        </h3>

                        <hr>
                        <div class="row">
                            <div class="col-xs-4">
                                <p><i class="fa fa-bed fa-lg"></i> <span style="color:black; font-weight: 600;"><small>{{ $property->beds }} Br</small></span></p>
                            </div>
                            <div class="col-xs-3">
                                <p><i class="fa fa-bath fa-lg"></i> <span style="color:black; font-weight: 600;"><small>{{ $property->bath }} Ba</small></span></p>
                            </div>
                            <div class="col-xs-5">
                                <p><i class="icon-ruler fa-lg"></i> <span style="color:black; font-weight: 600;"><small>{{ $property->sqft }} SQFT</small></span></p>
                            </div>
                        </div>
                        <p class="text-muted" style="font-size: 12px">{{ $property->location }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
