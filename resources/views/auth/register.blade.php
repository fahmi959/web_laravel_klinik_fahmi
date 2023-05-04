<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <style>
        body{
            background: #efefef;
        }
        .row{
            display: flex;
            justify-content: center;
        }
    </style>

    <title>Register | RS Nusa Bangsa</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-dark bg-primary mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">RS Nusa Bangsa</span>
      </div>
    </nav>
    <!-- akhir navbar -->
    
    
    <!-- content -->
    <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="wrapper bg-white text-center p-3">
                    <form method="post" action="/store_register">
                        @csrf
                        <h2 class="mb-4">Register</h2>
                        
                        @if($errors->any())
                        <div class="alert alert-danger my-4">
                            <ul>
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required value="{{old('username')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm">Konfirmasi Password</label>
                            <input type="password" name="confirm" class="form-control" id="confirm" required>
                        </div>
                        <div class="d-block mb-3">
                            <button type="submit" class="btn btn-success -block">Register</button>
                        </div>
                    </form>
                    <a class="nav-link" href="/login">Sudah punya akun? login sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir content -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>