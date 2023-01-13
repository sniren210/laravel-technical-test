@extends('layouts.home', ['params' => false])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Transaksi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('transaction') }}">Tabel</a></li>
                            <li class="breadcrumb-item active">Transaksi Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Deskripsi</b> <a class="float-right">{{ $transaction->desc }} </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tanggal </b> <a class="float-right">{{ $transaction->created_at }} </a>
                                    </li>

                                </ul>

                                <button data-toggle="modal" data-target="#delete{{ $transaction->id }}"
                                    class="btn btn-danger btn-block"><b>Hapus</b></button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#barang"
                                            data-toggle="tab">Barang</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#user" data-toggle="tab">User</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#supplier" data-toggle="tab">Supplier</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="barang">
                                        <!-- Post -->
                                        <div class="card card-primary">
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <strong><i class="fas fa-book mr-1"></i>Nama Barang</strong>

                                                <p class="text-muted">
                                                    {{ $transaction->barang->name }}
                                                </p>

                                                <hr>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->


                                    <div class="tab-pane" id="user">
                                        <strong><i class="fas fa-book mr-1"></i>Nama User</strong>

                                        <p class="text-muted">
                                            {{ $transaction->user->name }}
                                        </p>

                                        <hr>
                                    </div>

                                    <div class="tab-pane" id="supplier">
                                        <strong><i class="fas fa-book mr-1"></i>Nama supplier</strong>

                                        <p class="text-muted">
                                            {{ $transaction->supplier->name }}
                                        </p>

                                        <hr>
                                    </div>


                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="delete{{ $transaction->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    yakin ingin menghapus transaksi ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/transaction/{{ $transaction->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
