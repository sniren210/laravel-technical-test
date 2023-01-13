@extends('layouts.home', ['params' => false])

@section('content')
    <style>
        .dataTables_paginate {
            display: flex;
            justify-content: flex-end;
        }

        .dataTables_filter {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Transaksi Tabel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                            <li class="breadcrumb-item active">tabel</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (session('status'))
            <div class="content">
                <div class="alert alert-success" style="color: #155724; background-color: #d4edda;border-color: #c3e6cb;">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>deskripsi</th>
                                        <th>masuk/keluar</th>
                                        <th>tanggal</th>
                                        <th>aksi</th>
                                        <th>user</th>
                                        <th>supplier</th>
                                        <th>barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }} </td>
                                            <td>{{ $data->desc }} </td>
                                            <td>{{ $data->is_out ? 'keluar' : 'masuk' }} </td>
                                            <td>{{ $data->created_at }} </td>
                                            <td>
                                                <a href="{{ url('/transaction/' . $data->id) }}"
                                                    class="badge badge-info">Show</a>
                                            </td>
                                            <td>{{ $data->user->name }} </td>
                                            <td>{{ $data->supplier->name }} </td>
                                            <td>{{ $data->supplier->name }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>deskripsi</th>
                                        <th>masuk/keluar</th>
                                        <th>tanggal</th>
                                        <th>aksi</th>
                                        <th>user</th>
                                        <th>supplier</th>
                                        <th>barang</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('') }}plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('') }}plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('') }}plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('') }}plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                'columnDefs': [{
                    'visible': false,
                    'targets': [5, 6, 7]
                }],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5, 6, 7]
                    }
                }, {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5, 6, 7]
                    }
                }, "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
