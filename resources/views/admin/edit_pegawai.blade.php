@extends('layout.layout')

@section('title', 'Edit Pegawai')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Pegawai</h4>
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
                        <form method="post" action="/update_pegawai">
                            @csrf
                            <input type="hidden" value="{{$data->id}}" name="id">
                            <div class="mb-3">
                                <label for="no_pegawai">No Pegawai</label>
                                <input type="number" name="no_pegawai" id="no_pegawai" class="form-control" value="{{$data->no_pegawai}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required id="nama" value="{{ $data->nama }}">
                            </div>
                        <div class="mb-3">
                            <label for="diterima">Diterima</label>
                            <input type="date" name="diterima" required class="form-control" id="diterima" value="{{ $data->diterima }}">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="jabatan" value="{{ $data->jabatan }}">
                        </div>
                        <div class="mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="tel" name="telepon" id="telepon" class="form-control" value="{{ $data->telepon }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required>{{ $data->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection