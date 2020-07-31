@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-10">
                        <h1 class="text-white">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light">
                        <div class="row">
                                <div>
                                    {{$product->image}}
                                </div>
                                <div>
                                    <div>{{$product->name}}</div>
                                    <div>{{$product->price}}</div>
                                    <div>{{$product->available}}</div>
                                    <div>{{$product->description}}</div>
                                </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
