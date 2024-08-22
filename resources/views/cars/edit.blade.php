<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>Thêm mới</h1>
    <form action="{{ route('cars.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInput" class="form-label">car_model</label>
            <input type="text" class="form-control" name="car_model" value="{{ $data->car_model}}">
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">car_image</label>
            <input type="file" class="form-control" name="car_image">
            <img width="100px" src="{{ Storage::url($data->car_image) }}" alt="">
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">manufacturer</label>
            <input type="text" class="form-control" name="manufacturer"  value="{{ $data->manufacturer}}">
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">price</label>
            <input type="number" class="form-control" name="price"  value="{{ $data->price}}">
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">year</label>
            <input type="number" class="form-control" name="year"  value="{{ $data->year}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('cars.index') }}" class="btn btn-success">Quay lại</a>
    </form>
</body>

</html>
