@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Use Black Dashboard theme to create a great project.') }}
                            <br>
                            <a href="/product/create">Add New Product</a>

                        </p>
                        add to cart redis
                        <form class="form" method="post" action="{{ route('storeTemporaryCart') }}">
                        @csrf
                            <input type="test" name="product_id">
                            <input type="text" name="quantity">
                            <input type="text" name="guest">
                            <input type="submit">
                        </form>
                        <br>
                        remove from cart
                        <form class="form" method="post" action="{{ route('removeFromCart') }}">
                        @csrf
                            <input type="test" name="product_id">
                            <input type="text" name="quantity">
                            <input type="text" name="guest">
                            <input type="submit">
                        </form>
                        <br>
                        add to cart database
                        <form class="form" method="post" action="{{ route('storeTemporaryCart') }}">
                        @csrf
                            <input type="test" name="product_id">
                            <input type="text" name="quantity">
                            <input type="submit">
                        </form>
                        <br>
                        remove from cart database
                        <form class="form" method="post" action="{{ route('removeFromCart') }}">
                        @csrf
                            <input type="test" name="product_id">
                            <input type="text" name="quantity">
                            <input type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
