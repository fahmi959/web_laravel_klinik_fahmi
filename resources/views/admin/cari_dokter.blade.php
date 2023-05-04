@extends('layout.layout')

@section('title', 'Cari Dokter')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Cari Dokter</h4>
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
								    <p>{{count($dokter)}} hasil pencarian untuk <b>{{$keyword}}</b></p>
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
								
					<tr>
												<th>No</th>

		                  <th>No Dokter</th>
												<th>Nama</th>
												<th>Spesialis</th>
												<th>Diterima</th>
												<th>Telepon</th>
												<th>Alamat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
					<?php $i=1 ?>
					  @foreach($dokter as $d)						<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$d->no_dokter}}</td>
												<td>{{$d->nama}}</td>
												<td>{{$d->spesialis}}</td>
												<td>{{$d->diterima}}</td>
												<td>{{$d->telepon}}</td>
												<td>{{$d->alamat}}</td>
												<td>

                            <a href="/edit_dokter/{{$d->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_dokter">
                                @csrf
                                <input type="hidden" name="id" value="{{$d->id}}">
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