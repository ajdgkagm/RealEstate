@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="box-shadow: rgba(0, 0, 0, 0.10) 0 2px 2px 0">
        <div class="row" style="max-height: 350px; overflow: hidden;">
            <a href="#">
                <img style="height: 344px; width: 442px; float:left; margin-right: 3px" src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
            </a>
            <div style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;">
                @if(Mapper::render())
                    {!! Mapper::render() !!}
                @endif
            </div>
            @foreach($property->images as $ind=>$image)
                @if($image->file_name !== $property->firstImage()->file_name)
                <a href="#">
                    <img style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;" src="{{ asset('images/property/' . $image->file_name) }}" alt="an image" class="hidden-xs {{ $ind > 4 ? 'hidden-sm' : '' }}">
                </a>
                @endif
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container-fluid" style="box-shadow: rgba(0, 0, 0, 0.14) 0 2px 4px 0">
        <div class="row">
            <p class="text-center" style="margin-top: 15px">House </p>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="row bg-primary">
                    <p class="h3 text-center">Contact Premier Broker®</p>
                </div>

                <div class="row">
                    @if(session('msg'))
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Message: </strong> {{ session('msg') }}
                            </div>
                        </div>
                    @endif
                    @if($errors->any())
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {!! Form::open(['route' => 'message.store']) !!}
                    <br>
                    <div class="col-md-12">
                        {{ Form::bsText('name', null, ['label', 'placeholder' => 'Name']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::bsText('email', null, ['label', 'placeholder' => 'Email']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::bsNumber('contact', null, ['label', 'placeholder' => 'eg: 09178363574']) }}
                    </div>

                    <div class="col-md-12">
                        {{ Form::bsText('content', null, ['label', 'placeholder' => 'Content/Message']) }}
                    </div>

                    <div class="col-md-10 col-md-offset-1">
                        <button class="center-block btn-block btn btn-primary" type="submit" value="submit">Request Info</button>
                        <br>
                    </div>

                    {{--AGENTS --}}
                    @if($users)
                        @foreach($users as $user)
                            <div class="col-md-12">
                        <div class="radio" style="cursor: pointer" onclick="document.getElementById('agent1').click()">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label>
                                        <input type="radio" name="to" id="agent1" value="{{ $user->id }}">
                                    </label>
                                    <img class="img-circle" src="{{ asset('images/index.svg') }}" style="min-width: 50px; max-width: 60px; width: 100%" alt="#">
                                </div>


                                <div class="col-xs-8">
                                    <div class="row">
                                        <div class="col-xs-6" style="margin: 1px">
                                            <p class="text-primary">{{ $user->name }}</p>
                                        </div>

                                        <div class="col-xs-offset-6"></div>

                                        <div class="clearfix"></div>

                                        <div class="col-xs-6">
                                            <p style="margin-bottom: 1px">09081234034</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style="margin-bottom: 1px;">
                                                <span style=" color: #f7bc47;">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                </span> (125)
                                            </p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style="margin-bottom: 1px">McRealty Broker</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <p style="margin-bottom: 1px">5 Recent Sales</p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                        @endforeach
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="row" style="box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.07)">

                    <div class="col-xs-6">
                        <h3>₱12M</h3>
                    </div>
                    <div class="text-center" style="margin-top: 10px;">
                        <div class="col-xs-2">
                            <h4>4 <br> Beds</h4>
                        </div>
                        <div class="col-xs-2">
                            <h4>3 <br> Bath</h4>
                        </div>
                        <div class="col-xs-2">
                            <h4>2557 <br> sqft</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h1 class="text-center">Extra Details</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </div>

            <div class="col-md-6 col-md-offset-6" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="row">
                    <h1 class="text-center">Extra Details</h1>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </div>
        </div>
    </div>
@endsection
