@extends('layout.layout')

@section('title', 'Jadwal Praktek')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Jadwal Praktek</h4>
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
                         <form method="post" action="/cari_jadwal">
                             @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Dokter..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_jadwal" class="btn btn-success mb-3">Tambah</a>
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

                    	  <th>Nama</th>
												<th>Jam</th>
												<th>Hari</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php 
						//rumus: ($jadwal->currentPage*data per halaman) - (data per halaman - 1)
						$i=($jadwal->currentPage()*10) - 9
						?>			
						@foreach($jadwal as $j)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$j->nama}}</td>

              			  <td>{{$j->jam}}</td>
												<td>{{$j->hari}}</td>
												<td>
												    
                            <a href="/edit_jadwal/{{$j->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form action="/hapus_jadwal" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" value="{{$j->id}}" name="id">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
							</form>					</td>
											</tr>
						@endforeach					
										</tbody>
									</table>
								</div><!-- bd -->
						{{$jadwal->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection