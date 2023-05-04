@extends('layout.layout')

@section('title', 'Data Tindakan')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
							<a href="/data_tindakan">Kembali</a>
							<p>{{count($tindakan)}} hasil pencarian untuk <b>{{$keyword}}</b></p>
								    
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
					<?php $i=1?>					    
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
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection