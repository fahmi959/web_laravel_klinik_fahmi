@extends('layout.layout')

@section('title', 'Obat Dan Perlengkapan')

@section('content')
            <div class="container-fluid mg-t-20">

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
								<a href="/obat_perlengkapan">Kembali</a>
								<p>{{count($obat)}} hasil untuk pencarian <b>{{$keyword}}</b></p>
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Jenis</th>
												<th>Stok</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php $i=1?>				    
						@foreach($obat as $o)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$o->nama}}</td>
												<td>{{$o->jenis}}</td>
												<td>{{$o->stok}}</td>
												<td>
                            <a href="/edit_obat/{{$o->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_obat">
                                @csrf
                                <input type="hidden" name="id" value="{{$o->id}}">
                                <button type="submit" class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
							</form>					</td>
											</tr>
						@endforeach				</tbody>
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