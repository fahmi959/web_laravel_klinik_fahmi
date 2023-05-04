@extends('layout.layout')

@section('title', 'Cari Rawat')

@section('content')
            <div class="container-fluid mg-t-20">
				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
								<p>{{count($rawat)}} hasil pencarian untuk <b>{{$keyword}}</b></p>    
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Pasien</th>
												<th>Tipe</th>

                    		<th>Tanggal Masuk</th>
												<th>Tanggal Keluar</th>
												<th>Aksi</th>
					<?php $i=1?>
					@foreach($rawat as $d)						</tr>
										</thead>
										<tbody>
						<?php $i=1?>	
							<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$d->nama}}</td>
												<td>{{$d->tipe}}</td>
												<td>{{$d->tanggal_masuk}}</td>
												<td>
												    <?php  
									if($d->tanggal_keluar){
								echo $d->tanggal_keluar;
									}
									else{
									    echo 'none';
									}
							?>
												</td>
												<td>
                            <a href="/edit_datarawat/{{$d->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form class="d-inline" method="post" action="/hapus_datarawat">
                                @csrf
                            <input type="hidden" name="id" value="{{$d->id}}">
                            <button type="submit" class="btn" onclick="return confirm('Yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></button>
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