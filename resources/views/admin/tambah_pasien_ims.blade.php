@extends('layout.layout')

@section('title', 'Tambah Pasien')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Tambah Pasien</h4>
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
                        <form method="post" action="/store_pasien_ims">

                         {{--  INI PEMISAH UNTUK FORM YANG TAMPIL  --}}
                            @csrf
                            <div class="mb-3">
                                <label for="no_cm">No CM</label>
                                <input type="tel" name="no_cm" id="no_cm" class="form-control" required value="{{ old('no_cm') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required id="nama" value="{{ old('nama') }}">
                            </div>
                            <div class="mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" value="{{ old('nik') }}">
                            </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>

                    <div class="mb-3">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" class="form-control" id="tanggal_kunjungan" value="{{ old('tanggal_kunjungan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="diagnosa">Diagnosa</label>
                            <input type="text" name="diagnosa" required  class="form-control" id="diagnosa" value="{{ old('diagnosa') }}">
                        </div>

                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" id="status" value="{{ old('status') }}">
                        </div>

                        <div class="mb-3">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="{{ old('kelurahan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki - Laki" value="Laki - Laki" {{ old('jenis_kelamin') }}>
                                <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" {{ old('jenis_kelamin') }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="puskesmas">Puskesmas</label>
                            <input type="text" name="puskesmas" class="form-control" id="puskesmas" value="{{ old('puskesmas') }}">
                        </div>


                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
