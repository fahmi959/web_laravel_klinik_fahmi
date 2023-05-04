@extends('layout.layout')

@section('title', 'Cari Tempat Tidur')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Cari Tempat Tidur</h4>
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
							<a href="/tempat_tidur">Kembali</a>
                            <p>{{count($tmptidur)}} hasil pencarian untuk <b>{{$keyword}}</b></p>
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>No Tempat Tidur</th>
												<th>Ruang</th>
												<th>Status</th>
												<th>Diisi Oleh</th>
												<th>Terakhir Diupdate</th>
																	<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php $i=1 ?>
						@foreach($tmptidur as $t)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$t->nomor}}</td>
												<td>{{$t->ruang}}</td>
												<td>{{$t->status}}</td>
												<td>
												    <?php
								if($t->pasien){
								echo $t->pasien;
								}
								else{
								echo "none";
								} ?>
												</td>
												<td>{{$t->updated_at}}</td>

        			  <td>

                            <a href="/edit_tmptidur/{{$t->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form class="d-inline" method="post" action="/hapus_tmptidur">
                            <input type="hidden" value="{{$t->id}}" name="id">
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