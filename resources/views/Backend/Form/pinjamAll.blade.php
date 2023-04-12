@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h3 class="mb-sm-2">Peminjaman Elektronik</h3><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Peminajaman elektronik
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Add Data</button>
                <h4>List Peminjaman</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Alat</th>
                            <th>Peminjam</th>
                            <th>Jabatan</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Lama Pinjam</th>
                            <th>Keperluan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ 'P-' . str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->nama_alat }}</td>
                                <td>{{ $item->peminjam }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->lama_pinjam }}</td>
                                <td>{{ $item->keperluan }}</td>
                                <td>
                                     <a href="{{ route('divisi.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('divisi.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6 col-md-4 col-xl-3">

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Scrollable Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@endsection
