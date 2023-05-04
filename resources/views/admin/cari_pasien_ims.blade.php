@extends('layout.layout')

@section('title', 'Cari Pasien')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">


					<div class="left-content">
						<h4 class="content-title mb-1">Cari Pasien</h4>
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
								    <a href="/data_pasien_ims">Kembali</a>
								    <p>{{count($pasien_ims)}} hasil pencarian untuk <b>{{$keyword}}</b></p>

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
					<?php $i=1 ?>
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
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection
