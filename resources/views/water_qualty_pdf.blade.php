<!-- resources/views/water_quality_pdf.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Water Quality Report</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
        }
        .report-table th, .report-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        .report-table th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Water Quality Report</h1>
        <table class="table table-bordered report-table">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Temperature</td>
                    <td>{{ $temperature }}</td>
                </tr>
                <tr>
                    <td>Oxygen Level</td>
                    <td>{{ $oxygen }}</td>
                </tr>
                <tr>
                    <td>Ammonia</td>
                    <td>{{ $ammonia }}</td>
                </tr>
                <tr>
                    <td>Notification</td>
                    <td>{{ $notification }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
