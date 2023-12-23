<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiki Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center bg-success text-white py-3">Add Trip</h1>

        <a href="{{ route('trip.index') }}" class="btn btn-info">Back</a>

        <form action="{{ route('trip.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="from" class="form-label mt-2 fw-bold fs-5">From</label>
                <select class="form-select" name="from" aria-label="Default select example">
                    <option>From</option>
                    @foreach ($stands as $stand)
                    <option value="{{$stand->stand}}">{{$stand->stand}}</option>
                    @endforeach
                </select>
            </div>

            @error('from')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="to" class="form-label fw-bold fs-5">To</label>
                <select class="form-select" name="to" aria-label="Default select example">
                    <option>To</option>
                    @foreach ($stands as $stand)
                    <option value="{{$stand->stand}}">{{$stand->stand}}</option>
                    @endforeach
                </select>
            </div>

            @error('to')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="price" class="form-label fw-bold fs-5">Price</label>
                <input type="number" min="20" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>

            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="time" class="form-label fw-bold fs-5">Start Time</label>
                <input type="number" min="1" max="24" class="form-control" id="time" name="time" value="{{ old('time') }}">
            </div>

            @error('time')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="total" class="form-label fw-bold fs-5">Total Seat</label>
                <input type="number" min="0" max="36" class="form-control" id="total" name="total" value="{{ old('total') }}">
            </div>

            @error('total')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="date" class="form-label fw-bold fs-5">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>

            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary mb-3">Submit</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>