@extends('layout.layout')

@section('title', 'Data Pasien')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Data Pasien</h4>
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





							     <form method="post" action="/cari_pasien_ims">
							         @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Pasien..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>



                                <div class="input-group mb-4">



                                        <form action="{{ route('pasien_ims.import')}}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center; border: 1px solid #ccc; padding: 1px;">
                                            @csrf
                                            <input type="file" name="file" class="form-control" style="margin-right: 0px;">
                                            <button class="btn btn-secondary" type="submit"> Upload </button>
                                          </form>

                                        &nbsp;  &nbsp;

                                    <a href="{{ route('pasien_ims.pdf') }}"  class="mx-auto">
                                        <button class='btn btn-danger '  style="margin-left: 10px;">Cetak PDF</button>
                                    </a>


                                    <a href="{{ route('pasien_ims.export')}}"  >
                                        <button class='btn btn-warning'  >Download Excel</button>
                                    </a>

                                    <a href="/tambah_pasien_ims" class="btn btn-success ml-auto"  style="margin-left: 10px;">Tambah Data Pasien</a>


                                    <a href="{{ route('pasien_ims.delete_semua') }}"  class="ml-auto">
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
												<th>No</th>

                                                <th>No CM</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
												<th>Tanggal Lahir</th>
												<th>Tanggal Kunjungan</th>
                                                <th>Alamat</th>
												<th>Diagnosa</th>
												<th>Status</th>
												<th>Kelurahan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Puskesmas</th>
											</tr>
										</thead>
										<tbody>
					<?php
					//rumus: ($pasien_ims->currentPage()*jumlah data per halaman) - (jumlah data per halaman - 1)
					$i = ($pasien_ims->currentPage()*10) - 9 ?>
					  @foreach($pasien_ims as $p)
                      <tr>
												<th scope="row">{{$i++}}</th>
                                                <td>{{$p->no_cm}}</td>
												<td>{{$p->nama}}</td>
                                                <td>{{$p->nik}}</td>

                                                {{--  <td>{{$p->tanggal_lahir}}</td>  --}}
                                                {{--  ubah format tanggal --}}
                                                <td>{{date('d/m/Y', strtotime($p->tanggal_lahir))}}</td>
                                                <td>{{date('d/m/Y', strtotime($p->tanggal_kunjungan))}}</td>

                                                <td>{{$p->alamat}}</td>
                                                <td>{{$p->diagnosa}}</td>
                                                <td>

                            <?php
                            if($p->status){
                            echo $p->status;
                            }
                            else{
                                echo 'none';
                            }
                            ?>				</td>

												<td>{{$p->kelurahan}}</td>
												<td>{{$p->jenis_kelamin}}</td>
                                                <td>{{$p->puskesmas}}</td>
												<td>

                            <a href="/edit_pasien_ims/{{$p->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_pasien_ims">
                                @csrf
                                <input type="hidden" name="id" value="{{$p->id}}">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>
									    		</td>
											</tr>

					@endforeach
										</tbody>
									</table>
								</div><!-- bd -->
							</div><!-- bd -->
						{{$pasien_ims->links()}}
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
