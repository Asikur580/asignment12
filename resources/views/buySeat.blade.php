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
        <h1 class="text-center bg-success text-white py-3">Buy Ticket</h1>
        <a href="{{ route('customer') }}" class="btn btn-info text-light">Back</a>

        <form action="{{ route('customer.buySeat') }}" method="POST">
            @csrf

            <input type="text" id="id" name="id" value="{{$trip->id}}" hidden>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold fs-5">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold fs-5">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="seat_no" class="form-label fw-bold fs-5">Seat Number</label>
                <input type="number" max="5" min="1" class="form-control" id="seat_no" name="seat_no" placeholder="Enter the number of seat" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>