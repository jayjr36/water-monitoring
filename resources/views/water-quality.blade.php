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
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Oxygen Level</th>
                            <th>Temperature</th>
                            <th>Ammonia</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody id="waterQualityTable">
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
            <div class="col-md-6">
                <canvas id="waterQualityChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            var chartLabels = [];
            var oxygenLevels = [];
            var temperatures = [];
            var ammoniaLevels = [];

            // Initialize chart data
            @foreach ($waterQualities as $waterQuality)
                chartLabels.push("{{ $waterQuality->created_at->format('Y-m-d H:i:s') }}");
                oxygenLevels.push({{ $waterQuality->oxygen_level }});
                temperatures.push({{ $waterQuality->temperature }});
                ammoniaLevels.push({{ $waterQuality->ammonia }});
            @endforeach

            // Plot initial chart
            var ctx = document.getElementById('waterQualityChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Oxygen Level',
                        data: oxygenLevels,
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.1)'
                    }, {
                        label: 'Temperature',
                        data: temperatures,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.1)'
                    }, {
                        label: 'Ammonia',
                        data: ammoniaLevels,
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.1)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            type: 'time',
                            time: {
                                unit: 'minute'
                            }
                        }]
                    }
                }
            });

            // Update table and chart every 3 seconds
            setInterval(function() {
                $.get('/data', function(data) {
                    $('#waterQualityTable').empty().append(data);
                    chart.data.labels = data.chartLabels;
                    chart.data.datasets[0].data = data.oxygenLevels;
                    chart.data.datasets[1].data = data.temperatures;
                    chart.data.datasets[2].data = data.ammoniaLevels;
                    chart.update();
                });
            }, 3000);
        });
    </script>
</body>

</html>
