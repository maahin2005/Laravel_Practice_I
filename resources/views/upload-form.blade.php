<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center">Laravel File Upload</h3>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
            <br>
            <a href="{{ asset('storage/uploads/' . session('file')) }}" target="_blank">View File</a>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Choose file</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
</div>
</body>
</html>
