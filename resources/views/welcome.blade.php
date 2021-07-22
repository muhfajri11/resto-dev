{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}

@extends('layouts.app')

@section('title', 'Restoku')

@section('content')
    <div class="row mt-5">
        <div class="col-6">
            <div class="d-flex h-100">
                <div class="justify-content-center align-self-center">
                    <h1><strong>Delicious Food Menu,</strong><br/> in Your Gadget</h1>
                    <p>Ayo segera pilih makanan favorit anda.</p>
                    <a href="/foods" class="btn btn-md btn-success pl-3 pr-3"><i class="fas fa-long-arrow-alt-right mr-2"></i> Pesan</a>
                </div>
            </div>
        </div>

        <div class="col-6">
            <img src="{{ asset('img/image-hero.svg') }}" alt="img-hero" class="col-md-12 col-lg-9 d-block mx-auto">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-between">
            <h2>Best <strong>Foods</strong></h2>
            <a href="/foods" class="btn btn-md btn-success pl-3 pr-3"><i class="fas fa-eye mr-2"></i> Lihat Semua</a>
        </div>
        
        <div class="col-12 my-4">
            <div class="row">
                @foreach ($foods as $food)
                    <div class="col-4">
                        <div class="card shadow" style="border-radius: 1em;overflow: hidden;">
                            <img src="{{ asset('img/food/'.$food->gambar) }}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">{{ Str::ucfirst($food->nama) }}</h3>
                                <p class="card-text">Harga : Rp @rupiah($food->harga)</p>
								<button class="btn btn-large bg-success col-12 text-white" data-id="{{ $food->id }}" id="pesanFood"><i class="fas fa-shopping-cart mr-1"></i> Pesan</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
	</div>
	
	<div class="modal fade" id="modalFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row p-0">
                        <div class="col-12 p-0 relative">
                            <img src="" alt="img" class="img-fluid" id="imgFood">
                            <div class="food-desc">
                                <div class="container">
                                    <h3 class="my-3 text-white" id="nameFood"></h3>
                                    <p class="text-white">Harga : <strong id="hargaFood">Rp 000</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="container">
                                <div class="row my-3">
                                    <div class="col-5">
                                        <p class="col-12 p-0"><strong>Jumlah Pesanan</strong> :</p>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-sm btn-outline-secondary font-weight-bold" id="minOrder">-</button>
                                            </div>
                                            <input type="text"  
                                                class="ml-2 mr-2 text-center" 
                                                disabled 
                                                value="0"
												style="width: 5em;"
												id="banyakOrder"
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-outline-secondary font-weight-bold" id="addOrder">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <p class="col-12 p-0"><strong>Keterangan</strong> :</p>
                                        <textarea class="form-control" id="keterangan" rows="1"></textarea>
                                    </div>
									<button data-id="" id="addCart" class="btn btn-success col-11 mx-auto mt-3"><i class="fas fa-cart-plus"></i> Masukan Keranjang</button>
									
                                </div>
                            </div>
						</div>
						<button class="closeModal btn btn-lg btn-secondary"><i class="fas fa-times-circle text-white" style="font-size: 2rem"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection