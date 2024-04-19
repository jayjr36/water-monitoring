<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Quality Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Water Quality Data</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Parameter</th>
                    <th scope="col">Value</th>
                    <th scope="col">Unit</th>
                    <!-- Add more columns if necessary -->
                </tr>
            </thead>
            <tbody>
                @foreach($waterQualities as $key => $waterQuality)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $waterQuality->parameter }}</td>
                        <td>{{ $waterQuality->value }}</td>
                        <td>{{ $waterQuality->unit }}</td>
                        <!-- Add more columns if necessary -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
