@extends('layouts.home', ['params' => false])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile Supplier</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('supplier') }}">Tabel</a></li>
                            <li class="breadcrumb-item active">Supplier Profile</li>
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

                                <h3 class="profile-username text-center">{{ $supplier->name }} </h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Deskripsi</b> <a class="float-right">{{ $supplier->desc }} </a>
                                    </li>

                                </ul>

                                <a href="{{ url('/supplier/' . $supplier->id . '/edit') }}"
                                    class="btn btn-primary btn-block"><b>Edit</b></a>
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
                                    <li class="nav-item"><a class="nav-link" href="#transaction"
                                            data-toggle="tab">Transaksi</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="barang">
                                        <!-- Post -->
                                        <div class="card card-primary">
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                @foreach ($supplier->barang as $item)
                                                    <strong><i class="fas fa-book mr-1"></i>Name Product</strong>

                                                    <p class="text-muted">
                                                        {{ $item->name }}
                                                    </p>

                                                    <hr>
                                                @endforeach
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->


                                    <div class="tab-pane" id="transaction">
                                        <!-- The timeline -->
                                        @foreach ($supplier->transaction as $pay)
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        {{ $pay->created_at ?? '' }}
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <i class="fas fa-history bg-primary"></i>

                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header">
                                                            <b class="text-primary">Pay</b>
                                                            <span>
                                                                {{ $pay->jumlah }}
                                                            </span>
                                                        </h3>

                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                            </div>
                                        @endforeach
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
@endsection
