@extends('layout.layout')

@section('title', 'Data Puskesmas')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Data Puskesmas</h4>
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





							     <form method="post" action="/cari_data_puskesmas">
							         @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Puskesmas..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>



                                <div class="input-group mb-4">

                                    <a href="/tambah_data_puskesmas" class="btn btn-success mr-auto"  style="margin-left: 0px;">Tambah Data Pasien</a>

                                <form action="{{ route('puskesmas_kecamatan_kelurahans.import')}}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center; border: 1px solid #ccc; padding: 1px;">
  @csrf
  <input type="file" name="file" class="form-control" style="margin-right: 0px;">
  <button class="btn btn-secondary" type="submit"> Upload </button>
</form>

                                    &nbsp;  &nbsp;

                                <a href="{{ route('puskesmas_kecamatan_kelurahans.pdf') }}"  class="mx-auto">
                                    <button class='btn btn-danger '  style="margin-left: 10px;">Generate PDF</button>
                                </a>


                                <a href="{{ route('puskesmas_kecamatan_kelurahans.export')}}"  >
                                    <button class='btn btn-warning'  >Download Excel</button>
                                </a>


                                <a href="{{ route('puskesmas_kecamatan_kelurahans.delete_semua') }}"  class="ml-auto">
                                    <button class='btn btn-dark ' onclick="return confirm('Anda yakin ingin menghapus semua data?')" style="margin-left: 10px;">Hapus Semua</button>
                                </a>

                           </div>



								<div class="table-responsive" >
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
					<?php
					//rumus: ($fahmi->currentPage()*jumlah data per halaman) - (jumlah data per halaman - 1)
					$i = ($fahmi->currentPage()*10) - 9 ?>
					  @foreach($fahmi as $p)
                      <tr>

												{{-- // <th scope="row">{{$i++}}</th>  --}}

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
						{{$fahmi->links()}}
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
