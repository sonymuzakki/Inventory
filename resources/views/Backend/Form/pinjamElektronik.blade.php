@extends('admin.admin_master')

@section('admin')

<!-- Main Content -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Form Peminjaman Elektronic</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/from-data" id="myForm">
                    @csrf

                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Nama Alat</label>
                        <div class="form-group col-8">
                            <input name="nama_alat" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Peminjam</label>
                        <div class="form-group col-8">
                            <input name="peminjam" class="form-control" type="text" placeholder="" id="text">
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Jabatan</label>
                        <div class="form-group col-8">
                            <input name="jabatan" class="form-control" type="text" placeholder="" id="text">
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Tanggal Pinjam</label>
                        <div class="form-group col-8">
                            <input name="tanggal_pinjam" class="form-control" type="text" placeholder="" id="text">
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-2 col-form-label">Tanggal Kembali</label>
                        <div class="form-group col-8">
                            <input name="tanggal_kembali" class="form-control" type="text" placeholder="" id="text">
                        </div>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
