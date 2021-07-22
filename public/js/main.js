(function($){
	$(document).ready(function(){

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		const formatter = new Intl.NumberFormat('id', {
			style: 'currency',
			currency: 'IDR',
		});

		$(document).on('click', '#pesanFood', function(){
			$.ajax({
				url: '/getFood',
				type: 'POST',
				dataType: 'json',
				data:{ id : $(this).data('id') },
				cache: false,
				success: resp => {
					$('#modalFood').modal('show')

					let modal = $('#modalFood')
					modal.find('#nameFood').text(resp.data.nama)
					modal.find('#hargaFood').text(formatter.format(resp.data.harga))
					modal.find('#imgFood').attr('src', window.location.origin + '/img/food/' + resp.data.gambar)
					modal.find('#addCart').data('id', resp.data.id)
				},
				error: resp => console.log(resp)
			})
		})

		$('#addOrder').click(function(e){
			e.preventDefault()

			$('#modalFood').find('#banyakOrder').val( parseInt($('#modalFood').find('#banyakOrder').val()) + 1 )
		})

		$('#minOrder').click(function(e){
			e.preventDefault()

			if($('#modalFood').find('#banyakOrder').val() > 0){
				$('#modalFood').find('#banyakOrder').val( parseInt($('#modalFood').find('#banyakOrder').val()) - 1)
			}
		})

		$('#modalFood').on('click', '#addCart', function(e){
			e.preventDefault(); const modal = $('#modalFood');
			
			if(modal.find('#banyakOrder').val() <= 0){
				$.snack('error', 'Jumlah tidak boleh 0', 2000)
			} else {
				$.ajax({
					url: '/addCart',
					type: 'POST',
					dataType: 'json',
					data:{ 
						id : modal.find('#addCart').data('id'),
						jumlah: modal.find('#banyakOrder').val(),
						desc: modal.find('#keterangan').val()
					},
					cache: false,
					beforeSend : () => {
						modal.modal('hide')
	
						const load = `
							<div id="load">
								<div class="d-flex justify-content-center" style="margin-top: 40vh">
									<div class="spinner-grow text-dark" style="width: 3rem;height: 3rem"></div>
								</div>
								<p class="text-center text-dark text-blink mt-2 font-weight-bold">Tunggu ...</p>
							</div>
						`
						$('body').addClass('overflow-hidden')
						$(load).hide().appendTo('body').fadeIn(500)
					},
					success: resp => {
						$('#load').remove(); $('body').removeClass('overflow-hidden');
	
						alert(resp['data'])
					},
					error: resp => console.log(resp)
				})
			}
		})

		$('.closeModal').click(function(e){
			e.preventDefault(); 
			let parent = $(this).parent().parent().parent().parent().parent();

			parent.modal('hide');
		})

		$('#modalFood').on('hidden.bs.modal', function () {
			$(this).find('#banyakOrder').val(0);
		});

		$('#btnSearchFood').click(function(e){
			e.preventDefault()

			$.ajax({
				url: '/foodSearch',
				type: 'POST',
				dataType: 'json',
				data:{ search : $('#searchFieldFood').val() },
				cache: false,
				beforeSend : () => {
					$('#dataFoods').html('');
					$('#loadFood').removeClass('d-none');
				},
				success : resp => {
					$('#loadFood').addClass('d-none');
					let data = '';
					
					if(resp['data'].length != 0){
						for(let food of resp['data']){
							data += `
								<div class="col-4 mb-4">
									<div class="card shadow" style="border-radius: 1em;overflow: hidden;">
										<img src="${ window.location.origin + '/img/food/' + food.gambar }" class="card-img-top">
										<div class="card-body">
											<h3 class="card-title">${ food.nama }</h3>
											<p class="card-text">Harga : ${ formatter.format(food.harga) }</p>
											<button class="btn btn-large bg-success col-12 text-white" data-id="${ food.id }" id="pesanFood"><i class="fas fa-shopping-cart mr-1"></i> Pesan</button>
										</div>
									</div>
								</div>
							`
						}
					} else {
						data = `
							<h4 class="text-center col-12 text-secondary">Upppss yang kamu cari tidak ada ...</h4>
						`
					}

					$(data).hide().appendTo('#dataFoods').fadeIn(300);
				},
				error : (resp) => console.log(resp)
			})
		})		
	})
})(jQuery);