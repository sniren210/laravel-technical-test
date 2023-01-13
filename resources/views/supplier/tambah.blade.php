@extends('layouts.home', ['params' => false])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Supplier</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Supplier</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Supplier Create</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="/supplier" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="exampleInputEmail1" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <input type="text" class="form-control @error('desc') is-invalid @enderror"
                                            id="exampleInputEmail1" name="desc" value="{{ old('desc') }}">
                                        @error('desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="exampleInputFile">File input</label>
                                                <div class="input-group">
                                                    <div class="custom-control custom-file flex-wrap">
                                                        <input type="file"
                                                            class="custom-file-input  @error('img') is-invalid @enderror"
                                                            id="exampleInputFile" onchange="readURL(this);" name="img">
                                                        <label id="label" class="custom-file-label"
                                                            for="exampleInputFile">Choose
                                                            file</label>
                                                        @error('img')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <small class="d-block mt-4"> <cite title="Source Title">NOTE:</cite> Image
                                                    Tidak Harus </small>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="img-fluid pad" id="img" src="/img/default-150x150.png"
                                                alt="Photo">
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('/supplier') }}" class="btn btn-link">Kembali</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target);
                    $('#img').attr('src', e.target.result);
                    $('#label').text(e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
