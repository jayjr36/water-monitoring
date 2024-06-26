<!DOCTYPE html>
<html>
<head>
    <title>Water Quality Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Water Quality Monitoring Report</h1>
    <table>
        <thead>
            <tr>
                <th>Temperature</th>
                <th>Oxygen Level</th>
                <th>Ammonia</th>
                <th>Notification</th>
                <th>Recorded At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($waterQualities as $waterQuality)
                <tr>
                    <td>{{ $waterQuality->temperature }}</td>
                    <td>{{ $waterQuality->oxygen_level }}</td>
                    <td>{{ $waterQuality->ammonia }}</td>
                    <td>{{ $waterQuality->notification }}</td>
                    <td>{{ $waterQuality->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body
