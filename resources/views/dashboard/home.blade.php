@extends('layouts.home', ['params' => true])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $user }} </h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ url('user', []) }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $barang }} </h3>

                            <p>Barang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <a href="{{ url('wallet') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $supplier }} </h3>

                            <p>Supplier</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <a href="{{ url('school') }} " class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $transaction }} </h3>

                            <p>Transaction</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <a href="{{ url('history') }} " class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title"> Transaction History</h3>
                            </div>
                        </div>
                        <div class="card">

                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Transaction
                                </span>

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->


        </section>
    </div>
@endsection


@section('js')
    <script>
        $(function() {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $visitorsChart = $('#visitors-chart')
            // eslint-disable-next-line no-unused-vars
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI',
                        'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
                    ],
                    datasets: [{
                        type: 'line',
                        data: [JSON.parse(
                                "{{ isset($history['Jan']) ? json_encode(count($history['Jan'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Feb']) ? json_encode(count($history['Feb'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Mar']) ? json_encode(count($history['Mar'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Apr']) ? json_encode(count($history['Apr'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Mei']) ? json_encode(count($history['Mei'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Jun']) ? json_encode(count($history['Jun'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Jul']) ? json_encode(count($history['Jul'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Aug']) ? json_encode(count($history['Aug'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Sep']) ? json_encode(count($history['Sep'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Oct']) ? json_encode(count($history['Oct'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Nov']) ? json_encode(count($history['Nov'])) : 0 }}"
                            ),
                            JSON.parse(
                                "{{ isset($history['Des']) ? json_encode(count($history['Des'])) : 0 }}"
                            )
                        ],
                        backgroundColor: 'transparent',
                        borderColor: '#B570F7',
                        pointBorderColor: '#B570F7',
                        pointBackgroundColor: '#B570F7',
                        fill: false
                        // pointHoverBackgroundColor: '#B570F7',
                        // pointHoverBorderColor    : '#B570F7'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 50
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
@endsection
