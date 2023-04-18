@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="mb-sm-0">Data Inventory</h2><br></br><hr>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Form</a></li>
                    <li class="breadcrumb-item active">Data Inventaris
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>

{{--  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>
                    <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                        Filter
                    </button>
                </p>
                <div class="collapse show" id="collapseExample" style="">
                    <div class="card card-body mb-0">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>  --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{ route('invetaris.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right">Add Inventory</a>

                <h4>Inventory All Data</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Divisi</th>
                            <th>Lokasi</th>
                            <th>Hostname</th>
                            <th>Jenis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($inventory as $key => $item)
                            <tr>
                                <td>{{ 'R-' . str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item['user']['name']}}</td>
                                <td>{{ $item['user']['divisi']['nama'] }}</td>
                                <td>{{ $item['user']['lokasi']['nama'] }}</td>
                                <td>{{ $item->hostname }}</td>
                                <td>{{ $item['jenis']['nama'] }}</td>
                                <td>
                                     <a href="{{ route('inventaris.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                                     <a href="{{ route('invetaris.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                                     <a href="{{ route('invetaris.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
