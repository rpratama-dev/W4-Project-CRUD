@extends('layouts.master')

@push('styles')
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
	<div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Tulis Pertanyaan Baru 
              </h3>
              <!-- tools box 
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div> -->
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
            	<form role="form" id="quickForm" method="post" action="{{ $action == 'edit' ? '/pertanyaan/'.$question->id : '/pertanyaan' }}">
	                @csrf
	                @if($action=='edit')
	                	@method('PUT')
	                @endif

	                <div class="card-body">
	                  <div class="form-group">
	                    <label for="judul">Judul Pertanyaan</label>
	                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder="Judul Pertanyaan" value="{{ $action == 'edit' ? $question->judul : old('judul') }}">
	                    @error('judul')
	                    	<span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
						@enderror
	                  </div>
	                  <div class="form-group">
	                    <div class="mb-3">
	                    	<label for="pertanyaan">Pertanyaan</label>
			                <textarea class="textarea @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" placeholder="Isi pertanyaan"
			                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $action == 'edit' ? $question->isi : old('pertanyaan') }}</textarea>
			                @error('pertanyaan')
		                    	<span class="text-danger" style="font-size: 12.8px;">{{ $message }}</span><br> 
							@enderror
		              	</div>
	                  </div>
	                  <div class="form-group mb-0">
	                    <div class="custom-control custom-checkbox">
	                      <input type="checkbox" name="chTerms" class="custom-control-input" id="exampleCheck1">
	                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
	                    </div>
	                  </div>
	                </div>
	                <!-- /.card-body -->
	                <div class="card-footer">
	                  <button type="submit" class="btn btn-primary">Submit</button>
	                </div>
              </form> 
              <!--
              <p class="text-sm mb-0">
                Editor <a href="https://github.com/summernote/summernote">Documentation and license
                information.</a>
              </p>-->
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
@endsection

@push('scripts')
	<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<script>
		$(function () {
		// Summernote
		$('.textarea').summernote()
		})
	</script>
@endpush
