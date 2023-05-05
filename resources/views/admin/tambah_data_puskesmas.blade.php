@extends('layout.layout')

@section('title', 'Tambah Data Puskesmas')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Tambah Data Puskesmas</h4>
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
                        <form method="post" action="/store_data_puskesmas">

                         {{--  INI PEMISAH UNTUK FORM YANG TAMPIL  --}}
                            @csrf
                            <div class="mb-3">
                                <label for="kode_kd">Kode KD</label>
                                <input type="tel" name="kode_kd" id="kode_kd" class="form-control" required value="{{ old('kode_kd') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" required id="kelurahan" value="{{ old('kelurahan') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kode_puskesmas">Kode Puskesmas</label>
                                <input type="text" class="form-control" name="kode_puskesmas" required id="kode_puskesmas" value="{{ old('kode_puskesmas') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_puskesmas">Nama Puskesmas</label>
                                <input type="text" class="form-control" name="nama_puskesmas" required id="nama_puskesmas" value="{{ old('nama_puskesmas') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kode_kecamatan">Kode Kecamatan</label>
                                <input type="text" class="form-control" name="kode_kecamatan" required id="kode_kecamatan" value="{{ old('kode_kecamatan') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_kecamatan">Nama Kecamatan</label>
                                <input type="text" class="form-control" name="nama_kecamatan" required id="nama_kecamatan" value="{{ old('nama_kecamatan') }}">
                            </div>
                            <div class="mb-3">
                                <label for="kode_kelurahan">Kode Kelurahan</label>
                                <input type="text" class="form-control" name="kode_kelurahan" required id="kode_kelurahan" value="{{ old('kode_kelurahan') }}">
                            </div>



                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
