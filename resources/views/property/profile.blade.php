@extends('layouts.app')

@section('content')
{{--    <style>
        @import url(https://fonts.googleapis.com/css?family=Quicksand:400,300);

        body {
            font-family: 'Quicksand', sans-serif;
        }

        .gal-container {
            padding: 12px;
        }

        .gal-item {
            overflow: hidden;
            padding: 3px;
        }

        .gal-item .box {
            height: 350px;
            overflow: hidden;
        }

        .box img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            -o-object-fit: cover;
        }

        .gal-item a:focus {
            outline: none;
        }

        .gal-item a:after {
            content: "\e003";
            font-family: 'Glyphicons Halflings';
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.75);
            position: absolute;
            right: 3px;
            left: 3px;
            top: 3px;
            bottom: 3px;
            text-align: center;
            line-height: 350px;
            font-size: 30px;
            color: #fff;
            -webkit-transition: all 0.5s ease-in-out 0s;
            -moz-transition: all 0.5s ease-in-out 0s;
            transition: all 0.5s ease-in-out 0s;
        }

        .gal-item a:hover:after {
            opacity: 1;
        }

        .modal-open .gal-container .modal {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-open .gal-item .modal-body {
            padding: 0px;
        }

        .modal-open .gal-item button.close {
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: #000;
            opacity: 1;
            color: #fff;
            z-index: 999;
            right: -12px;
            top: -12px;
            border-radius: 50%;
            font-size: 15px;
            border: 2px solid #fff;
            line-height: 25px;
            -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.35);
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.35);
        }

        .modal-open .gal-item button.close:focus {
            outline: none;
        }

        .modal-open .gal-item button.close span {
            position: relative;
            top: -3px;
            font-weight: lighter;
            text-shadow: none;
        }

        .gal-container .modal-dialogue {
            width: 80%;
        }

        .gal-container .description {
            position: relative;
            height: 40px;
            top: -40px;
            padding: 10px 25px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            text-align: left;
        }

        .gal-container .description h4 {
            margin: 0px;
            font-size: 15px;
            font-weight: 300;
            line-height: 20px;
        }

        .gal-container .modal.fade .modal-dialog {
            -webkit-transform: scale(0.1);
            -moz-transform: scale(0.1);
            -ms-transform: scale(0.1);
            transform: scale(0.1);
            top: 100px;
            opacity: 0;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }

        .gal-container .modal.fade.in .modal-dialog {
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
            -webkit-transform: translate3d(0, -100px, 0);
            transform: translate3d(0, -100px, 0);
            opacity: 1;
        }

        @media (min-width: 768px) {
            .gal-container .modal-dialog {
                width: 55%;
                margin: 50px auto;
            }
        }

        @media (max-width: 768px) {
            .gal-container .modal-content {
                height: 250px;
            }
        }

        /* Footer Style */
        i.red {
            color: #BC0213;
        }

        .gal-container {
            padding-top: 75px;
            padding-bottom: 75px;
        }

        footer {
            font-family: 'Quicksand', sans-serif;
        }

        footer a, footer a:hover {
            color: #88C425;
        }

    </style>--}}
    <div class="container-fluid" style="box-shadow: rgba(0, 0, 0, 0.10) 0 2px 2px 0">
        <div class="row" style="max-height: 345px; overflow: hidden;">

            <div class="col-md-4 col-sm-6 co-xs-12 gal-item">
                <div class="box">
                    <a href="#" data-toggle="modal" data-target="#2">
                        @if(env('FILESYSTEM_DRIVER') === null)
                            <img style="height: 344px; width: 442px; float:left; margin-right: 3px"
                                 src="{{ asset('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
                        @else
                            <img style="height: 344px; width: 442px; float:left; margin-right: 3px"
                                 src="{{ Storage::url('images/property/' . $property->firstImage()->file_name) }}" alt="an image">
                        @endif
                    </a>
                    <div class="modal fade" id="2" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <div class="modal-body">
                                    <a href="#"></a>
                                    <img style="height: 344px; width: 442px; float:left; margin-right: 3px"
                                         src="{{ asset('images/property/' . $property->firstImage()->file_name) }}"
                                         alt="an image">

                                    <a href="#">
                                        @if(env('FILESYSTEM_DRIVER') === null)
                                            <img style="height: 344px; width: 442px; float:left; margin-right: 3px"
                                                 src="{{ asset('images/property/' . $property->firstImage()->file_name) }}"
                                                 alt="an image">
                                        @else
                                            <img style="height: 344px; width: 442px; float:left; margin-right: 3px"
                                                 src="{{ Storage::url('images/property/' . $property->firstImage()->file_name) }}"
                                                 alt="an image">
                                        @endif

                                    </a>

                                </div>
                                <div class="col-md-12 description">
                                    <h4>This is the second one on my Gallery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;">
                {{--@if(Mapper::render())--}}
                    {!! Mapper::render() !!}
                {{--@endif--}}
            </div>
            @foreach($property->images as $ind=>$image)
                @if($image->file_name !== $property->firstImage()->file_name)
                    <a href="#">
                        @if(env('FILESYSTEM_DRIVER') === null)
                            <img style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;"
                                 src="{{ asset('images/property/' . $property->firstImage()->file_name) }}"
                                 alt="an image" class="hidden-xs {{ $ind > 4 ? 'hidden-sm' : '' }}">
                        @else
                            <img style="height: 172px; width: 221px; float:left; margin-right: 3px; margin-bottom: 2px;"
                                 src="{{ Storage::url('images/property/' . $image->file_name) }}" alt="an image"
                                 class="hidden-xs {{ $ind > 4 ? 'hidden-sm' : '' }}">
                        @endif
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
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <strong>Message: </strong> {{ session('msg') }}
                            </div>
                        </div>
                    @endif
                    @if($errors->any())
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
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
                        <button class="center-block btn-block btn btn-primary" type="submit" value="submit">Request
                            Info
                        </button>
                        <br>
                    </div>

                    {{--AGENTS --}}
                    @if($users)
                        @foreach($users as $user)
                            <div class="col-md-12">
                                <div class="radio" style="cursor: pointer"
                                     onclick="document.getElementById('agent1').click()">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label>
                                                <input type="radio" name="to" id="agent1" value="{{ $user->id }}">
                                            </label>
                                            <img class="img-circle" src="{{ asset('images/index.svg') }}"
                                                 style="min-width: 50px; max-width: 60px; width: 100%" alt="#">
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
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i>
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

            <div class="col-md-6 col-md-offset-1"
                 style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="row" style="box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.07)">

                    <div class="col-xs-6">
                        <h3>₱ {{ $property->price }}</h3>
                    </div>
                    <div class="text-center" style="margin-top: 10px;">
                        <div class="col-xs-2">
                            <h4>{{ $property->beds }} <br> Beds</h4>
                        </div>
                        <div class="col-xs-2">
                            <h4>{{ $property->bath }} <br> Bath</h4>
                        </div>
                        <div class="col-xs-2">
                            <h4>{{ $property->sqft }} <br> sqft</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h1 class="text-center">Extra Details</h1>
                    <br><br><br><br><br>
                </div>

            </div>

            <div class="col-md-6 col-md-offset-6"
                 style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="row">
                    <h1 class="text-center">Extra Details</h1>
                    <br><br><br><br><br>
                </div>

            </div>

        </div>
    </div>
@endsection
