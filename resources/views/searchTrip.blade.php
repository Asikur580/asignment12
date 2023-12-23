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

        <h1 class="text-center bg-success text-white py-3">Search Trip</h1>
        <a href="{{ route('home') }}" class="btn btn-info text-light mb-2">Back</a>

        @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
        @endif

        <form class="row g-3 mt-1" action="{{ route('customer.searchTrip') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="from" class="form-label fw-bold fs-5">From</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="From stand" value="{{ old('from') }}" >
            </div>

            <div class="col-md-6">
                <label for="to" class="form-label fw-bold fs-5">To</label>
                <input type="text" class="form-control" id="to" name="to" placeholder="To stand" value="{{ old('to') }}" >
            </div>

            <div class="col-12">
                <label for="date" class="form-label fw-bold fs-5">Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Place to date" value="{{ old('date') }}" >
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search Trip</button>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>