@extends('layouts.app')

@section('title', 'Restoku | Foods')

@section('content')
	<div class="row mt-4">
		<div class="col-12">
			<h1>Daftar <strong>Makanan</strong></h1>

			<form id="searchFoods" class="mt-3">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Apa yang kamu cari?" id="searchFieldFood">
					<div class="input-group-append">
						<button id="btnSearchFood" class="btn btn-success font-weight-bold">CARI <i class="fas fa-search ml-2"></i></button>
					</div>
				</div>
				{{-- <div class="invalid-feedback">
					Example invalid input group feedback
				</div> --}}
			</form>
		</div>

		<div class="col-12 mt-4">
			<div id="loadFood" class="row d-none">
				<div class="col-12 d-flex justify-content-center">
					<div class="spinner-grow text-secondary" style="width: 3rem;height: 3rem"></div>
				</div>
				<p class="col-12 text-center text-secondary text-blink mt-2">Tunggu ...</p>
			</div>
			<div id="dataFoods" class="row">
				@foreach ($foods as $food)
					<div class="col-4 mb-4">
						<div class="card shadow cardFood" style="border-radius: 1em;overflow: hidden;">
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
									<button id="addCart" class="btn btn-success col-11 mx-auto mt-3" data-id=""><i class="fas fa-cart-plus"></i> Masukan Keranjang</button>
									
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