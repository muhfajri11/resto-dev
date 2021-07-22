@section('modalFood')
    <!-- Modal -->
    <div class="modal fade" id="modalFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row p-0">
                        <div class="col-12 p-0 relative">
                            <img src="http://localhost:8000/img/food/nasi-rames.jpg" alt="img" class="img-fluid" id="imgFood">
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
                                                <button class="btn btn-sm btn-outline-secondary font-weight-bold">-</button>
                                            </div>
                                            <input 
                                                type="text"  
                                                class="ml-2 mr-2 text-center" 
                                                disabled 
                                                value="0"
                                                style="width: 5em;"
                                            >
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-outline-secondary font-weight-bold" >+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <p class="col-12 p-0"><strong>Keterangan</strong> :</p>
                                        <textarea class="form-control" id="keterangan" rows="1"></textarea>
                                    </div>
                                    <button class="btn btn-success col-11 mx-auto mt-3"><i class="fas fa-cart-plus"></i> Masukan Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection