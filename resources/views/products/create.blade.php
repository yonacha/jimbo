@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/products/create.css') }}" />

    <div class="col-md-10 text-center ml-auto mr-auto">
        <h3 class="mb-5">Fill in the data below to create brand new product in your shop</h3>
    </div>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-white">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Add New Product') }}</h1>
                </div>
                <div class="card-body">
                    <p class="text-dark mb-2">{{__('Enter the data of the new product below')}}
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-notes"></i>
                            </div>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="input-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-money-coins"></i>
                            </div>
                        </div>
                        <input type="text" placeholder="{{ __('Price') }}" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'price'])
                    </div>
                    <div class="input-group{{ $errors->has('shortDescription') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-paper"></i>
                            </div>
                        </div>
                        <textarea type="text" placeholder="{{ __('Short description of a Product') }}" name="shortDescription" class="form-control{{ $errors->has('shortDescription') ? ' is-invalid' : '' }}"></textarea>
                        @include('alerts.feedback', ['field' => 'shortDescription'])
                    </div>
                    <div class="input-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-paper"></i>
                            </div>
                        </div>
                        <textarea type="text" placeholder="{{ __('Full description of a Product') }}" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        @include('alerts.feedback', ['field' => 'description'])
                    </div>
                    <div class="input-group pl-3 pt-1">
                        <div class="input-group-prepend align-items-center">
                            <p style="color:#525f7f">Available by default?</p>
                        </div>
                        <input type="checkbox" name="available" class="form-control form-checkbox">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Create New Product') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
