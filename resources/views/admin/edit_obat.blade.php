@extends('layout.layout')

@section('title', 'Edit Obat Dan Perlengkapan')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Obat Dan Perlengkapan</h4>
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
                        <form method="post" action="/update_obat">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" required class="form-control" value="{{ $data->nama }}">
                            </div>
                        <div class="mb-3">
                            <label for="jenis">Jenis</label>
                            <select id="jenis" name="jenis" class="form-control">
                                <optgroup label="Obat">
                                    <option  value="Paracetamol" <?php if($data->jenis == 'Paracetamol'){echo 'selected';} ?>>Paracetamol</option>
                                    <option value="Antibiotik" <?php if($data->jenis == 'Antibiotik'){echo 'selected';} ?>>Antibiotik</option>
                                    <option value="Antiseptik" <?php if($data->jenis == 'Antiseptik'){echo 'selected';} ?>>Antiseptik</option>
                                </optgroup>
                                <optgroup label="Perlengkapan">
                                <option value="APD" <?php if($data->jenis == 'APD'){echo 'selected';} ?>>Alat Pelindung Diri (APD)</option>
                                <option value="Alat Periksa" <?php if($data->jenis == 'Alat Periksa'){echo 'selected';} ?>>Alat Periksa</option>
                                </optgroup>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" required class="form-control" id="stok" value="{{ $data->stok }}">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection