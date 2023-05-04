@extends('layout.layout')

@section('title', 'Edit Tempat Tidur')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Tempat Tidur</h4>
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
					    <div class="alert alert-danger my-4">
					        {{session('pasien')}}
					    </div>
					    @endif
					    
                        <form method="post" action="/update_tmptidur">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <label for="nomor">Nomor Tempat Tidur</label>
                                <input type="number" name="nomor" id="nomor" required class="form-control" value="{{ $data->nomor }}">
                            </div>
                        <div class="mb-3">
                            <label for="ruang">Ruang</label>
                            <input type="text" name="ruang" required class="form-control" id="ruang" value="{{ $data->ruang }}">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status"
                            class="form-control">
                                <option value="Terisi" <?php if($data->status == 'Terisi'){echo 'selected';}  ?>>Terisi</option>
                                <option value="Kosong" <?php if($data->status == 'Kosong'){echo 'selected';} ?>>Kosong</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pasien">Pasien</label>
                            <input type="text" name="pasien" id="pasien" value="{{$data->pasien}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success" name="update"><i class="fas fa-save"></i> Update</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection