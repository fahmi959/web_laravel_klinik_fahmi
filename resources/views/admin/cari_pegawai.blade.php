@extends('layout.layout')

@section('title', 'Cari Pegawai')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Cari Pegawai</h4>
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
								<div class="table-responsive">
								    <a href="/">Kembali</a>
								    <p>{{count($pegawai)}} hasil pencarian untuk <b>{{$keyword}}</b></p>
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
								
					<tr>
												<th>No</th>

		                  <th>ID Pegawai</th>
												<th>Nama</th>
												<th>Posisi</th>
												<th>Diterima</th>
												<th>Alamat</th>
												<th>Telepon</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
					<?php $i=1 ?>
					  @foreach($pegawai as $p)						<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$p->no_pegawai}}</td>
												<td>{{$p->nama}}</td>
												<td>{{$p->jabatan}}</td>
												<td>{{$p->diterima}}</td>
												<td>{{$p->alamat}}</td>
												<td>{{$p->telepon}}</td>
												<td>

                            <a href="/edit_pegawai/{{$p->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_pegawai">
                                @csrf
                                <input type="hidden" name="id" value="{{$p->id}}">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>
									    		</td>
											</tr>
											
					@endforeach
										</tbody>
									</table>
								</div><!-- bd -->
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection