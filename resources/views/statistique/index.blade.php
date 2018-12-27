@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify">

            <div class="col-md-12" style="margin-top: 10px">
                <div class="card">
                    <div class="card-body">
                        <canvas id="canvas"></canvas>

                        <script>
                            window.chartColors = {
                                red: 'rgb(255, 99, 132)',
                                orange: 'rgb(255, 159, 64)',
                                yellow: 'rgb(255, 205, 86)',
                                green: 'rgb(75, 192, 192)',
                                blue: 'rgb(54, 162, 235)',
                                purple: 'rgb(153, 102, 255)',
                                grey: 'rgb(201, 203, 207)'
                            };

                            $(function () {
                            });

                            var labels = @json($labels);
                            var spents = @json($spents);
                            var bills = @json($bills);

                            var lineChartData = {
                                labels: labels,
                                datasets: [{
                                    label: 'Dépense',
                                    borderColor: window.chartColors.red,
                                    backgroundColor: window.chartColors.red,
                                    fill: false,
                                    data: spents,
                                    yAxisID: 'y-axis-2',
                                }, {
                                    label: 'Revenue',
                                    borderColor: window.chartColors.green,
                                    backgroundColor: window.chartColors.green,
                                    fill: false,
                                    data: bills,
                                    yAxisID: 'y-axis-2'
                                }]
                            };

                            window.onload = function () {
                                var ctx = document.getElementById('canvas').getContext('2d');
                                window.myLine = Chart.Line(ctx, {
                                    data: lineChartData,
                                    options: {
                                        responsive: true,
                                        hoverMode: 'index',
                                        stacked: false,
                                        title: {
                                            display: true,
                                            text: 'Bilan cumulatif'
                                        },
                                        scales: {
                                            yAxes: [{
                                                type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                                                display: true,
                                                position: 'right',
                                                id: 'y-axis-2',

                                                // grid line settings
                                                gridLines: {
                                                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                                                },
                                            }],
                                        }
                                    }
                                });
                            };
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
