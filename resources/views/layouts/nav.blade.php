<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">
		<a class="navbar-brand" href="/">Restoku</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item{{ request()->is('/')? ' active': '' }}">
					<a class="nav-link" href="/">Home</a>
				</li>
				<li class="nav-item{{ request()->is('foods')? ' active': '' }}">
					<a class="nav-link" href="/foods">Food</a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item{{ request()->is('cart')? ' active': '' }}">
					<a class="nav-link" href="/cart">Keranjang <i class="fas fa-shopping-cart"></i> <span class="badge badge-success" id="countOrder">{{ $count ?? 0 }}</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>