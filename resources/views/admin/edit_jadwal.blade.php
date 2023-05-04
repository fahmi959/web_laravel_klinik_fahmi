@extends('layout.layout')

@section('title', 'Edit Jadwal')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Jadwal</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
					    @if(session('empty'))
					    <div class="alert alert-danger my-3">
					        {{session('empty')}}
					    </div>
					    @endif
					    
					    @if($errors->any())
					        <div class="alert alert-danger my-3">
					            <ul>
					                @foreach($errors->all() as $e)
					                <li>{{$e}}</li>
					                @endforeach
					            </ul>
					        </div>
					    @endif
                        <form method="post" action="/update_jadwal">
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="id">
                            <div class="mb-3">
                                <input type="hidden" name="no_dokter" id="no_dokter" required class="form-control" value="{{$no_dokter}}">
                            </div>
                        <div class="mb-3">
                            <label for="jam">Jam (awal - akhir)</label>
                            <input type="text" name="jam" required class="form-control" id="jam" value="{{ $data->jam }}" placeholder="Contoh: 08.00 - 16.00">
                        </div>
                        <div class="mb-3">
                            <label for="hari">Hari (awal - akhir)</label>
                            <input type="text" name="hari" required class="form-control" id="hari" value="{{ $data->hari }}" placeholder="Contoh: Senin - Jumat">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection