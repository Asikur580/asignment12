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

        <h1 class="text-center bg-success text-white py-3">Find Trips</h1>
        <a href="{{ route('customer') }}" class="btn btn-info text-light">Back</a>

        <table class="table table-dark text-center table-striped mt-2">

            <tr>
                <th>SI</th>
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th>Start Time</th>
                <th>Due Seat</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            @php
            $i=1;
            @endphp

            @foreach ($trips as $trip)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$trip->from}}</td>
                <td>{{$trip->to}}</td>
                <td>{{$trip->price}}</td>
                <td>{{$trip->time}}</td>
                <td>{{$trip->due_seat}}</td>
                <td>{{$trip->date}}</td>
                <td>
                    <a href="{{route('customer.seatPlan', ['id' => $trip->id]) }}" class="btn btn-primary">Buy</a>
                </td>
            </tr>

            @endforeach

        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>