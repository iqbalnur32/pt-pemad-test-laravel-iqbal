<html>
<title>Ini Test Iqbal</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <div class="content-wrapper" style="margin-top: 87px;">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="{{ route('login.proses') }}" method="POST">
              @csrf
              <div class="card-body">
                <p style="color: red; font-size: 15px;" >Login sederhana, jika belum terdaftar langsung isi saja menggunakan email dan password, jika emailnya belum terdaftar dia akan langsung login</p>
                <h5 class="card-title">Login</h5>
                @if(Session::has('error'))
                  <div class="alert alert-danger">
                    {{ Session::get('error') }}
                  </div>
                @endif
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label for="">password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <br>
                <div class="float-right">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>

    <script src="{{ asset('main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</head>

</html>