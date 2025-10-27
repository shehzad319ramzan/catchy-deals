<x-layouts.auth page-title="Dashboard">
    <div class="row">
        <div class="col-xl-6 col-xxl-7">
            <x-auth.card>
                <div class="chart chart-sm">
                    <div id="datetimepicker-dashboard"></div>
                </div>
            </x-auth.card>
        </div>

        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <x-auth.card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Sales Today</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle" data-feather="truck"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">2.562</h1>
                        </x-auth.card>

                        <x-auth.card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total users</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">17.212</h1>
                        </x-auth.card>
                    </div>
                    <div class="col-sm-6">
                        <x-auth.card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Earnings</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle" data-feather="dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">$24.300</h1>
                        </x-auth.card>
                        <x-auth.card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pending Orders</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="avatar">
                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="display-5 mt-1 mb-3">43</h1>
                        </x-auth.card>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-xxl-12">
            <x-auth.card card-header="Users" header-button="true">
                <div class="align-self-center w-100">
                    <div class="chart">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </x-auth.card>
        </div>
    </div>

    @section('auth_scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Line chart
                new Chart(document.getElementById("chartjs-dashboard-line"), {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                            "Dec"
                        ],
                        datasets: [{
                                label: "Orders",
                                fill: true,
                                backgroundColor: window.theme.primary,
                                borderColor: window.theme.primary,
                                borderWidth: 2,
                                data: [3, 2, 3, 5, 6, 5, 4, 6, 9, 10, 8, 9]
                            },
                            {
                                label: "Sales ($)",
                                fill: true,
                                backgroundColor: "rgba(0, 0, 0, 0.05)",
                                borderColor: "rgba(0, 0, 0, 0.05)",
                                borderWidth: 2,
                                data: [5, 4, 10, 15, 16, 12, 10, 13, 20, 22, 18, 20]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        legend: {
                            display: false
                        },
                        tooltips: {
                            intersect: false
                        },
                        hover: {
                            intersect: true
                        },
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        elements: {
                            point: {
                                radius: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0.0)"
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 5
                                },
                                display: true,
                                gridLines: {
                                    color: "rgba(0,0,0,0)",
                                    fontColor: "#fff"
                                }
                            }]
                        }
                    }
                });
            });
        </script>

        <script>
            $(function() {
                $('#datetimepicker-dashboard').datetimepicker({
                    inline: true,
                    sideBySide: false,
                    format: 'L'
                });
            });
        </script>
    @endsection
</x-layouts.auth>
