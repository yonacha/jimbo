@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="css/welcome/welcome.css">
@endsection

@section('content')
    <link>

    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-9">
                        <h1 class="text-white">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Use Black Dashboard theme to create a great project.') }}
                            <br>
                            <a href="/product/create">Add New Product</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products py-7 py-lg-8">
        <div class="container row pt-15 m-0">
            @foreach($products as $product)
                @if($product->available)
                    <div class="productContainer col-lg-4 col-md-6 px-4">
                        <div class="photo mt-5">
                            <img src="/storage/{{$product->image}}" alt="" class="productImage">
                        </div>
                        <div class="align-items-center mb-5 mt-2">
                            <div class="details pl-1 pull-left">
                                <div class="name">
                                    <p class="my-0">{{$product->name}}</p>
                                </div>
                                <div class="price">
                                    <p class="my-0">{{$product->price}}</p>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button class="addToCart h-25 btn btn-light"
                                        style="padding: 8px">{{__('ADD TO CART')}}</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="row col-12 paginationRow pt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
