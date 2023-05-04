@extends('layout.layout')

@section('title', 'Data Tempat Tidur')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Data Tempat Tidur</h4>
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
 <form method="post" action="/cari_tmptidur">
     @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Ruang..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_tmptidur" class="btn btn-success mb-3">Tambah</a>
								<div class="table-responsive">
								    @if(session('sukses'))
								    <div class="alert alert-success my-4">
								        {{session('sukses')}}
								    </div>
								    @endif
								    
								    @if(session('hapus'))
								    <div class="alert alert-danger my-4">
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
												<th>No Tempat Tidur</th>
												<th>Ruang</th>
												<th>Status</th>
												<th>Diisi Oleh</th>
												<th>Terakhir Diupdate</th>
																	<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php
						//rumus: ($tmptidur->currentPage()*data per halaman) - (data per halaman - 1)
						$i=($tmptidur->currentPage()*10) - 9 
						?>
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
                                @csrf
                            <input type="hidden" value="{{$t->id}}" name="id">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>
												</td>
											</tr>
						@endforeach					
										</tbody>
									</table>
								</div><!-- bd -->
							{{$tmptidur->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection