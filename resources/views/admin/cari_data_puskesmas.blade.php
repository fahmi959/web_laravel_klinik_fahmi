@extends('layout.layout')

@section('title', 'Cari Puskesmas')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Cari Puskesmas</h4>
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
								    <a href="/data_puskesmas">Kembali</a>
								    <p>{{count($data_puskesmas)}} hasil pencarian untuk <b>{{$keyword}}</b></p>

									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>


                                            <tr>
												{{--  <th>Jumlah Data</th>  --}}

                                                <th>Kode KD</th>
                                                <th>Kelurahan</th>
                                                <th>Kode Puskesmas</th>
												<th>Nama Puskesmas</th>
												<th>Kode Kecamatan</th>
                                                <th>Nama Kecamatan</th>
												<th>Kode Kelurahan</th>

											</tr>
										</thead>
										<tbody>
					<?php $i=1 ?>
					  @foreach($data_puskesmas as $p)

                      <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$p->kode_kd}}</td>
                        <td>{{$p->kelurahan}}</td>
                        <td>{{$p->kode_puskesmas}}</td>
                        <td>{{$p->nama_puskesmas}}</td>
                        <td>{{$p->kode_kecamatan}}</td>
                        <td>{{$p->nama_kecamatan}}</td>
                        <td>{{$p->kode_kelurahan}}</td>
                        <td>

                            <a href="/edit_data_puskesmas/{{$p->kode_kd}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_data_puskesmas">
                                @csrf
                                <input type="hidden" name="kode_kd" value="{{$p->kode_kd}}">
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
