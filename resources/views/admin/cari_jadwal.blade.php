@extends('layout.layout')

@section('title', 'Cari Jadwal')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
								    <a href="/jadwal_praktek">Kembali</a>
								    <p>{{count($jadwal)}} hasil untuk pencarian <b>{{$keyword}}</b></p>
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
						<?php $i=1?>			
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
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection