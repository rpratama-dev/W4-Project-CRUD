
@extends('layouts.master')


@section('content')
	<div class="card">
		<div class="card-header">
			<h2 class="card-title text-lg-center">Pertanyaan terbaru</h2>

			<div class="card-tools">
				<a href="/pertanyaan/create">
					<button type="button" class="btn btn-block btn-primary btn-sm">Buat Pertanyaan</button>
				</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<ul class="products-list product-list-in-card pl-2 pr-2">

				<!-- start each question data from controller -->
				@foreach($questions as $question)
				<li class="item">
					<div class="product-img">
						<img src="{{ asset('adminlte/dist/img/default-150x150.png') }}" alt="Product Image" class="img-size-50">
					</div>
					<div class="product-info">
						<a href="{{ '/pertanyaan/'.$question->id }}" class="product-title">{{ $question->judul }}
							<span class="badge badge-success float-right">10 Jawaban</span>
						</a>
						<span class="product-description">
							{!! $question->isi !!}
						</span>
					</div>
				</li>
				<!-- end foreach -->
				@endforeach

				<!-- /.item -->
			</ul>
		</div>
		<!-- /.card-body -->
		<div class="card-footer text-center">
			<a href="javascript:void(0)" class="uppercase">Lihat semua pertanyaan</a>
		</div>
		<!-- /.card-footer -->
	</div>
	<!-- /.card --> 
@endsection

