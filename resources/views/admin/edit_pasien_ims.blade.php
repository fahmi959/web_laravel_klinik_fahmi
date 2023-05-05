@extends('layout.layout')

@section('title', 'Edit Pasien')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Edit Pasien</h4>
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
                        <form method="post" action="/update_pasien_ims">

                             {{--  INI PEMISAH UNTUK FORM YANG TAMPIL  --}}
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="id">
                            <div class="mb-3">
                                <label for="no_cm">No CM</label>
                                <input type="tel" name="no_cm" id="no_cm"  readonly  class="form-control" value="{{ $data->no_cm }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required id="nama" value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" name="nik" readonly id="nik" value="{{ $data->nik }}">
                            </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="form-control" id="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <input type="date" name="tanggal_kunjungan" class="form-control" id="tanggal_kunjungan" value="{{ $data->tanggal_kunjungan }}">
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ $data->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="diagnosa">Diagnosa</label>
                            <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="{{$data->diagnosa}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <input type="text" name="status" id="status" class="form-control" value="{{$data->status  }}">
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" name="kelurahan" id="kelurahan" class="form-control" value="{{$data->kelurahan}}">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki - Laki" value="Laki - Laki"  {{ $data->jenis_kelamin == 'Laki - Laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan"  {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                         <div class="mb-3">
                            <label for="puskesmas">Puskesmas</label>
                            <input type="text" name="puskesmas" id="puskesmas" class="form-control" value="{{$data->puskesmas}}">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
