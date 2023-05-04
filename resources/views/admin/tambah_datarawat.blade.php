@extends('layout.layout')

@section('title', 'Tambah Jadwal')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Tambah Data Rawat</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					    
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
					    <div class="alert alert-danger my-4">
					        {{session('pasien')}}
					    </div>
					    @endif
					    
                        <form method="post" action="/store_datarawat">
                            @csrf
                            <div class="mb-3">
                                <label for="pasien">Pasien</label>
                                <input type="text" name="pasien" id="pasien" required class="form-control" value="{{ old('pasien') }}">
                            </div>
                        <div class="mb-3">
                            <label for="tipe">Tipe</label>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="Rawat Jalan">Rawat Jalan</option>
                                <option value="Rawat Inap">Rawat Inap</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tglmasuk">Tanggal Masuk</label>
                            <input type="date" name="tglmasuk" required class="form-control" id="tglmasuk" value="{{ old('tglmasuk') }}">
                        </div>
                        <div class="mb-3">
                            <label for="tglkeluar">Tanggal Keluar</label>
                            <input type="date" name="tglkeluar" id="tglkeluar" class="form-control" value="{{ old('tglkeluar') }}">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection