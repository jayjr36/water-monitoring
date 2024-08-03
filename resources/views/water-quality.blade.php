<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Water Quality Monitoring System</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center bg-primary py-3 text-white">Water Quality Monitoring System</h2>
        <div class="row py-5">
            <div class="col-md-9 table-responsive">
                <table class="table table-bordered table-group-divider table-striped">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Id</th>
                            <th class="bg-primary text-white">Device No</th>
                            <th class="bg-primary text-white">pH</th>
                            <th class="bg-primary text-white">Ammonia</th>
                            <th class="bg-primary text-white">Turbidity</th>
                            <th class="bg-primary text-white">Temperature</th>
                            <th class="bg-primary text-white">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($waterQualities as $waterQuality)
                        <tr>
                            <td>{{ $waterQuality->id }}</td>
                            <td>{{ $waterQuality->device_no }}</td>
                            <td>{{ $waterQuality->ph }}</td>
                            <td>{{ $waterQuality->ammonia }}</td>
                            <td>{{ $waterQuality->turbidity }}</td>
                            <td>{{ $waterQuality->temperature }}</td>
                            <td>{{ $waterQuality->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="text-center py-5 font-bold fs-4">GRAPHS</div>
                    <div class="col-md-6">
                        <canvas id="phChart" width="600" height="400"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="temperatureChart" width="600" height="400"></canvas>
                    </div>
                       
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <canvas id="ammoniaChart" width="600" height="400"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="turbidityChart" width="600" height="400"></canvas>
                    </div>  
                </div>
            </div>
            <div class="col-md-3">
                <div class="container">
                    <h3>Notifications</h3>
                    <div class="card-body">
                        @foreach ($waterQualities as $waterQuality)
                        {{ $waterQuality->notification }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <a href="{{ route('download') }}" class="btn btn-secondary px-5">DOWNLOAD</a>
        </div>
    </div>

    <!-- Load chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
     var rawLabels = {!! json_encode($waterQualities->pluck('created_at')) !!};

// Format the date strings
var labels = rawLabels.map(function(dateString) {
    var date = new Date(dateString);
    return date.toLocaleDateString(); // You can adjust the locale and options as needed
});

var phLevels = {!! json_encode($waterQualities->pluck('ph')) !!};
var temperatures = {!! json_encode($waterQualities->pluck('temperature')) !!};
var ammonias = {!! json_encode($waterQualities->pluck('ammonia')) !!};
var turbidityLevels = {!! json_encode($waterQualities->pluck('turbidity')) !!};

var ctxPh = document.getElementById('phChart').getContext('2d');
var phChart = new Chart(ctxPh, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'pH Level',
            data: phLevels,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctxTemperature = document.getElementById('temperatureChart').getContext('2d');
var temperatureChart = new Chart(ctxTemperature, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Temperature',
            data: temperatures,
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctxAmmonia = document.getElementById('ammoniaChart').getContext('2d');
var ammoniaChart = new Chart(ctxAmmonia, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Ammonia',
            data: ammonias,
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctxTurbidity = document.getElementById('turbidityChart').getContext('2d');
var turbidityChart = new Chart(ctxTurbidity, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Turbidity',
            data: turbidityLevels,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    </script>
</body>
</html>
