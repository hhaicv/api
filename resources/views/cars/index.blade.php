<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Danh sách</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary float-end" >Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">car_model</th>
                <th scope="col">car_image</th>
                <th scope="col">manufacturer</th>
                <th scope="col">price</th>
                <th scope="col">year</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->car_model }}</td>
                    <td><img width="100px" src="{{ Storage::url($item->car_image) }}" alt=""></td>
                    <td>{{ $item->manufacturer }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->year }}</td>
                    <td><a href="{{ route('cars.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('cars.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('bạn có xóa không')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
