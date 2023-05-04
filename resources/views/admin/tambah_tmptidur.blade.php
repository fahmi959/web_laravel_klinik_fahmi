@extends('layout.layout')

@section('title', 'Tambah Jadwal')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Tambah Tempat Tidur</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
					    
					    @if($errors->any())
					        <div class="alert alert-danger my-3">
					            <ul>
					                @foreach($errors->all() as $e)
					                <li>{{$e}}</li>
					                @endforeach
					            </ul>
					        </div>
					    @endif
					    
					    @if(session('pasien'))
					    <div class="alert alert-danger my-3">
					        {{session('pasien')}}
					    </div>
					    @endif
					    
                        <form method="post" action="/store_tmptidur">
                            @csrf
                            <div class="mb-3">
                                <label for="nomor">Nomor Tempat Tidur</label>
                                <input type="number" name="nomor" id="nomor" required class="form-control" value="{{ old('nomor') }}">
                            </div>
                        <div class="mb-3">
                            <label for="ruang">Ruang</label>
                            <input type="text" name="ruang" required class="form-control" id="ruang" value="{{ old('ruang') }}">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                            class="form-control">
                                <option value="Terisi">Terisi</option>
                                <option value="Kosong">Kosong</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" id="pasien" value="{{old('pasien')}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection