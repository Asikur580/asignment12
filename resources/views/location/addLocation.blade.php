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
        <h1 class="text-center bg-success text-white py-3">Add Location</h1>

        <a href="{{ route('location.index') }}" class="btn btn-info">Back</a>

        <form action="{{ route('location.store') }}" method="POST">
            @csrf
            <div class="mb-3">

                <label for="stand" class="form-label mt-2 fw-bold fs-5">Stand</label>
                <input type="text" class="form-control" id="stand" name="stand" required>


            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>