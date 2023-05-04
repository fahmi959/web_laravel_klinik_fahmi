@extends('layout.layout')

@section('title', 'Data Tindakan')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Data Tindakan</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
                     <form method="post" action="/cari_tindakan">
                         @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Pasien..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_tindakan" class="btn btn-success mb-3">Tambah</a>
								<div class="table-responsive">
								    
								    @if(session('sukses'))
								    <div class="alert alert-success my-4">
								        {{session('sukses')}}
								    </div>
								    @endif
								    
								    @if(session('hapus'))
								    <div class="alert alert-warning my-4">
								        {{session('hapus')}}
								    </div>
								    @endif
								    
								    @if(session('update'))
								    <div class="alert alert-info my-4">
								        {{session('update')}}
								    </div>
								    @endif
								    
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Pasien</th>
											
												<th>Jenis Tindakan</th>
												<th>Waktu</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
					<?php
					//rumus: ($tindakan->currentPage()*data per halamab) - (data per halaman - 1) 
					$i= ($tindakan->currentPage()*10) - 9
					?>					    
					@foreach($tindakan as $t)						<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$t->nama}}</td>
											
												<td>{{$t->nama_tindakan}}</td>
												<td>{{$t->created_at}}</td>
												<td>
												   
                            <a href="/edit_tindakan/{{$t->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_tindakan">
                            @csrf
                            <input type="hidden" name="id" value="{{$t->id}}">
                            <button class="btn" type="submit" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
							</form>					</td>
											</tr>
					@endforeach					</tbody>
									</table>
								</div><!-- bd -->
							{{$tindakan->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection