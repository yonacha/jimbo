
@extends('layouts.app')



@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('/css/products/create.css') }}" />

    <div class="col-md-10 text-center ml-auto mr-auto">
        <h3 class="mb-5">Fill in the data below to create brand new product in your shop</h3>
    </div>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('storeNewProduct') }}" enctype="multipart/form-data">
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
                    <div class="input-group{{ $errors->has('short_description') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-paper"></i>
                            </div>
                        </div>
                        <textarea type="text" placeholder="{{ __('Short description of a Product') }}" name="short_description" class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}"></textarea>
                        @include('alerts.feedback', ['field' => 'short_description'])
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
                    <div class="text-center"><label class="form-label">{{__('Product image')}}</label></div>
                    <div class="input-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-image-02"></i>
                            </div>
                        </div>
                        <input type="file" name="image" id ="image" class="form-control">
                        @include('alerts.feedback', ['field' => 'image'])
                    </div>
                    <div class="input-group pl-3 pt-1">
                        <div class="input-group-prepend align-items-center pr-5">
                            <p style="color:#525f7f">Available by default?</p>
                        </div>
                        <label class="checkbox-container">
                        <input type="checkbox" name="available" class="form-control form-checkbox">
                        <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Create New Product') }}</button>
                </div>
            </div>
        </form>
    </div>


    <script src="{{ asset('black') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('black') }}/js/plugins/bootstrap-notify.js"></script>

    <script>
        if( {!! json_encode($flag)!!} === "createdNewProduct"){
            console.log("testtt");
            $.notify({
                message: 'The product has been created!'
            },{
                type:'success',
                placement:{
                    from:'top',
                    align:'center'
                },
                delay: 1500,
            })
        }

    </script>
@endsection
