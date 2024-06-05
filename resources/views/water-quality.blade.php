<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <title>Document</title>
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
                            <th class="bg-primary text-white">Oxygen Level</th>
                            <th class="bg-primary text-white">Temperature</th>
                            <th class="bg-primary text-white">Ammonia</th>
                            <th class="bg-primary text-white">Created At</th>
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
            
                <div class="row">
                    <div class="text-center py-5 font-bold fs-4">GRAPHS</div>
                    <div class="col-md-4">
                        <canvas id="oxygenChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-md-4">
                        <canvas id="temperatureChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-md-4">
                        <canvas id="ammoniaChart" width="400" height="400"></canvas>
                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="container">
                    <h3>Notificatins</h3>
                    <div class="card-body">
                        @foreach ($waterQualities as $waterQuality)
                        {{ $waterQuality->notifications }}
                        @endforeach
                    </div>
                    
                </div>
                
            </div>
        </div>
       
      <div class="row">
        <a href="{{route('download')}}" class="btn btn-secondary px-5">DOWNLOAD</a>
      </div>
    </div>
    
    <!-- Load chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var oxygenLevels = {!! json_encode($waterQualities->pluck('oxygen_level')) !!};
        var temperatures = {!! json_encode($waterQualities->pluck('temperature')) !!};
        var ammonias = {!! json_encode($waterQualities->pluck('ammonia')) !!};
        var labels = {!! json_encode($waterQualities->pluck('created_at')) !!};
    
        var ctxOxygen = document.getElementById('oxygenChart').getContext('2d');
        var oxygenChart = new Chart(ctxOxygen, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Oxygen Level',
                    data: oxygenLevels,
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
    
        // Create Ammonia Chart
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
    </script>
    

</body>
</html>