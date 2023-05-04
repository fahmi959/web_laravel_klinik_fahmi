@extends('layout.layout')

@section('title', 'Data Pegawai')

@section('content')
<div class="container-fluid mg-t-20">

	<!-- breadcrumb -->

	<div class="breadcrumb-header justify-content-between">

					
		<div class="left-content">
			<h4 class="content-title mb-1">Data Pegawai</h4>
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
                    <form method="post" action="/cari_pegawai">
                        @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Pegawai..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_pegawai" class="btn btn-success mb-3">Tambah</a>
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
						<th>Id Pegawai</th>
						<th>Nama</th>
						<th>Posisi</th>
						<th>Diterima</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Aksi</th>
						</tr>
					  </thead>
						<tbody>
						    <?php 
						    //rumus: ($pegawai->currentPage()*data per halaman) - data per halaman - 1
						    $i = ($pegawai->currentPage()*10) - 9 ?>
						    @foreach($pegawai as $p)
							<tr>
							<th scope="row">{{$i++}}</th>
							<td>{{$p->no_pegawai}}</td>
							<td>{{$p->nama}}</td>
							<td>{{$p->jabatan}}</td>
							<td>{{$p->diterima}}</td>
							<td>{{$p->alamat}}</td>
							<td>{{$p->telepon}}</td>
												<td>
									
                            <a href="/edit_pegawai/{{$p->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>

								<form class="d-inline" method="post" action="/hapus_pegawai">
								    @csrf
								    <input type="hidden" name="id" value="{{$p->id}}">
								    <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
								</form>				</td>
											</tr>
						@endforeach
										</tbody>
									</table>
								</div><!-- bd -->
								<div class="mb-3"></div>
							{{$pegawai->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection