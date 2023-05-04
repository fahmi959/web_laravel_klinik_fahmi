<!DOCTYPE html>
<html>
    <head>
        <title>Laravel PDF</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                float: left;
                font-family: "Open Sans", sans-serif;
                font-size: 11px; /* mengubah ukuran font */
                line-height: 0.8;
            }
            h1, h2 {
                font-weight: 400;
                margin: 0 0 20px;
            }
            table {

                border-collapse: collapse;
                width: 20%;
                margin-bottom: 20px;
            }
            table th, table td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
                vertical-align: middle;
            }
            table th {
                background-color: #f2f2f2;
            }

            .title {
                font-family: "Pacifico", cursive;
                font-size: 36px;
                color: #006699;
                text-align: center;
                margin-bottom: 30px;
            }
            footer {
                margin-top: 50px;
                margin-bottom: 20px;
                text-align: center;
                color: #777;
                font-size: 12px;
                position: absolute;
                bottom: 0;
                width: 100%;
            }
            .container {
                max-width: 960px;
                margin: 0 auto;
            }
            @media print {
                table {

                    border-collapse: collapse;
                    width: 20%;
                    margin-bottom: 20px;
                    overflow-x: auto; /* menambahkan scroll horizontal */
                }
                table th, table td {
                    border: 1px solid #ccc;
                    padding: 5px; /* mengubah lebar kolom */
                    text-align: left;
                    vertical-align: middle;
                }
                table th {
                    background-color: #f2f2f2;
                }
                footer {
                    margin-top: 50px;
                    margin-bottom: 20px;
                    text-align: center;
                    color: #777;
                    font-size: 12px;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>

        <div class="title">Rumah Sakit Cirebon</div>

        <div class="logo"></div>

        <div class="container">
            <h1 style="margin-top: 30px;text-align:center">Cetak Rekam Medis</h1>

            <table class="table">
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
                    <?php $i = 1; ?>
                    @foreach ($pasien_ims as $row)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$row->no_cm}}</td>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->nik}}</td>
                        <td>{{date('d/m/Y', strtotime($row->tanggal_lahir))}}</td>
                        <td>{{date('d/m/Y', strtotime($row->tanggal_kunjungan))}}</td>
                        <td>{{$row->alamat}}</td>
                        <td>{{$row->diagnosa}}</td>
                        <td>
                            <?php
                            if($row->status){
                                echo $row->status;
                            }
                            else{
                                echo 'none';
                            }
                            ?>
                        </td>
                        <td>{{$row->kelurahan}}</td>
                        <td>{{$row->jenis_kelamin}}</td>
                        <td>{{$row->puskesmas}}</td>

                            <a href="/edit_pasien_ims/{{$row->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form method="post" class="d-inline" action="/hapus_pasien_ims">

                                <input type="hidden" name="id" value="{{$row->id}}">
                                <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <footer>Generated by [Rumah Sakit Cirebon] on <?php echo date('Y-m-d H:i:s'); ?></footer>
        </body>
</html>
