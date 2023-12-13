<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-light" href="#">2Deuce</a>
            </li>
          </ul>
        </div>

      </nav>

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif

    <div class="container">
        <div>
            <h1>Create Film Status</h1>
            <div class="row">
                <div class="col-sm-12">
                    <form method="POST" action="/FilmStatus/store" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Filmstatus" class="form-label">Film Status</label>
                            <input type="text" class="form-control" id="Filmstatus" name="Filmstatus" value="{{ old('Filmstatus') }}">
                            @if($errors->has('Filmstatus'))
                                <span class="text-danger">{{ $errors->first('Filmstatus') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>