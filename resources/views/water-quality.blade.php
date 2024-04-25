<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Quality Monitoring</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr class="text-center">Water Quality Data</tr>
                <tr>
                    <th>#</th>
                    <th>Oxygen Level</th>
                    <th>Temperature</th>
                    <th>Ammonia</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waterQualities as $waterQuality)
                    <tr>
                        <td>{{ $waterQuality->id }}</td>
                        <td>{{ $waterQuality->oxygen_level }}</td>
                        <td>{{ $waterQuality->temperature }}</td>
                        <td>{{ $waterQuality->ammonia }}</td>
                        <td>{{ $waterQuality->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $.get('/', function(data) {
                    $('.table thead tbody').empty();
                    $('.table thead tbody').append(data);
                });
            }, 3000);
        });
    </script>
</body>

</html>
