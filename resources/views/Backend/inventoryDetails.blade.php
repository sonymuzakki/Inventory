{{--  @extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Start Page  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                    <div class="row">
                        <div class="col-3 mb-2">
                            <label class="col-sm-2 col-form-label">User</label>
                                <div class="form-group col-sm-10">
                                    <select name="user_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($user as $u)
                                        <option value="{{ $u->id }}" {{ $u->id == $inventaris->user_id ? 'selected' : '' }} ">{{ $u->name }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3 mb-2">
                            <label class="col-2 col-form-label">Lokasi</label>
                                <div class="form-group col-sm-10">
                                    <select name="lokasi_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($lokasi as $l)
                                        <option value="{{ $l->id }}" {{ $l->id == $inventaris->lokasi_id ? 'selected' : '' }} >{{ $l->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Divisi</label>
                                <div class="form-group col-10">
                                    <select name="divisi_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($divisi as $d)
                                        <option value="{{ $d->id }}" {{ $d->id == $inventaris->divisi_id ? 'selected' : '' }} > {{ $d->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="form-group col-sm-10">
                                    <select name="jenis_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($jenis as $j)
                                        <option value="{{ $j->id }}" {{ $j->id == $inventaris->jenis_id ? 'selected' : '' }} > {{ $j->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                            <div class="form-group col-11">
                                <input name="hostname" class="form-control" type="text" value="{{ $inventaris->hostname }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">OS</label>
                            <div class="form-group col-11">
                                <input name="os" class="form-control" type="text" value="{{ $inventaris->os }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Merk</label>
                            <div class="form-group col-11">
                                <input name="merk" class="form-control" type="text" value="{{ $inventaris->merk }}" placeholder="" id="text"disabled>
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Office</label>
                            <div class="form-group col-11">
                                <input name="Office" class="form-control" type="text" value="{{ $inventaris->Office }}" placeholder="" id="text"disabled>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Processor</label>
                            <div class="form-group col-11">
                                <input name="Processor" class="form-control" type="text" value="{{ $inventaris->Processor }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                            <div class="form-group col-11">
                                <input name="akunOffice" class="form-control" type="text" value="{{ $inventaris->akunOffice }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">RAM</label>
                            <div class="form-group col-11">
                                <input name="ram" class="form-control" type="text" value="{{ $inventaris->ram }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">SSD</label>
                            <div class="form-group col-11">
                                <input name="ssd" class="form-control" type="text" value="{{ $inventaris->ssd }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                            <div class="form-group col-11">
                                <input name="grafik" class="form-control" type="text" value="{{ $inventaris->grafik }}" placeholder="" id="text"disabled>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">

                        </div>
                    </div>

                    {{--
                    <div class="row mb-3">

                    </div>
                    <!-- end row -->  --}}
@extends('admin.admin_master')

@section('admin')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory Details</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Start Page  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('invetaris.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                    <div class="row">
                        <div class="col-3 mb-2">
                            <label class="col-sm-2 col-form-label">User</label>
                                <div class="form-group col-sm-10">
                                    <select name="user_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($user as $u)
                                        <option value="{{ $u->id }}" {{ $u->id == $inventaris->user_id ? 'selected' : '' }} ">{{ $u->name }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3 mb-2">
                            <label class="col-2 col-form-label">Lokasi</label>
                                <div class="form-group col-sm-10">
                                    <select name="lokasi_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($lokasi as $l)
                                        <option value="{{ $l->id }}" {{ $l->id == $inventaris->lokasi_id ? 'selected' : '' }} >{{ $l->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Divisi</label>
                                <div class="form-group col-10">
                                    <select name="divisi_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($divisi as $d)
                                        <option value="{{ $d->id }}" {{ $d->id == $inventaris->divisi_id ? 'selected' : '' }} >{{ $l->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                        <div class="col-3">
                            <label class="col-sm-2 col-form-label">Jenis</label>
                                <div class="form-group col-sm-10">
                                    <select name="jenis_id" class="form-select" aria-label="Default select example"disabled>
                                        <option selected="">Open this select menu</option>
                                        @foreach($jenis as $j)
                                        <option value="{{ $j->id }}" {{ $j->id == $inventaris->jenis_id ? 'selected' : '' }} >{{ $l->nama }}</option>
                                    @endforeach
                                        </select>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                            <div class="form-group col-11">
                                <input name="hostname" class="form-control" value={{ $inventaris->hostname }} type="text"  placeholder="" id="text" disabled>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">OS</label>
                            <div class="form-group col-11">
                                <input name="os" class="form-control" type="text" value={{ $inventaris->os }} placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Merk</label>
                            <div class="form-group col-11">
                                <input name="merk" class="form-control" type="text" value={{ $inventaris->merk }} placeholder="" id="text">
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Office</label>
                            <div class="form-group col-11">
                                <input name="Office" class="form-control" type="text" value={{ $inventaris->Office }} placeholder="" id="text">
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Processor</label>
                            <div class="form-group col-11">
                                <input name="Processor" class="form-control" type="text" value={{ $inventaris->Processor }} placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                            <div class="form-group col-11">
                                <input name="akunOffice" class="form-control" type="text" value={{ $inventaris->akunOffice }} placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">RAM</label>
                            <div class="form-group col-11">
                                <input name="ram" class="form-control" type="text" value={{ $inventaris->ram }} placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">SSD</label>
                            <div class="form-group col-11">
                                <input name="ssd" class="form-control" type="text" value={{ $inventaris->ssd }} placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                            <div class="form-group col-11">
                                <input name="grafik" class="form-control" type="text" value={{ $inventaris->grafik }}  placeholder="" id="text">
                            </div>
                        </div>
                        <div class="col-6 col-form-label">
                            <label  for="ExampleInputEmail" class="form-label">Legal OS ?</label>
                            <select class="form-control" name="legalos" aria-label="Default Select example">
                              <option>{{ $inventaris->os }}</option>
                            </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2 col-form-label">
                            <label  for="text" class="form-label">Internet ?</label>
                            <select class="form-control" name="internet" aria-label="Default Select example">
                              <option>{{ $inventaris->internet }}</option>
                            </select>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                            <div class="form-group col-11">
                                <input name="ipaddress" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label class="col-6 col-form-label">Security AMP ?</label>
                                <div class="form-group col-11">
                                    <select name="amp" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>
                        <div class="col-6">
                            <label class="col-6 col-form-label">Security Umbrella ?</label>
                                <div class="form-group col-11">
                                    <select name="umbrella" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>

                                        <option value="Yes">Yes </option>
                                        <option value="NO">NO </option>
                                        </select>
                                </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="text" class="col-sm-2 col-form-label">Ip Address</label>
                            <div class="form-group col-11">
                                <input name="ipaddress" class="form-control" type="text"  placeholder="" id="text">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-6 mb-2">

                        </div>
                    </div>


                    <div class="row mb-3">

                    </div>
                    <!-- end row -->






                {{--  <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Inventory">  --}}
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row mt-3">
    <div class="col-12">
        <class class="card container-fluid mb-3">
            <h4 class="mt-3">History Data</h4><br></br>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse:collapse;border-spacing:0; width:100%;">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="20px">Laporan</th>
                    <th width="20px">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($history as $key => $item)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>{{ $item->status }}</td>
                        {{--  <td>
                             <a href="{{ route('inventaris.edit' , $item->id )}}" class="btn btn-info sm" title="Edit Data"> <i class="fas fa-edit"></i></a>
                             <a href="{{ route('invetaris.delete', $item->id) }}" class="btn btn-danger sm" title="Delete" id="delete"> <i class="fas fa-trash-alt"></i></a>
                             <a href="{{ route('invetaris.details', $item->id) }}" class="btn btn-danger sm" title="Details" > <i class="fa thin fa-info"></i></a>
                        </td>  --}}
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div> <!-- end col -->
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                hostname: {
                    required : true,
                },
                ram: {
                    required : true,
                },
                hardisk: {
                    required : true,
                },
            },
            messages :{
                hostname: {
                    required : 'Please Enter Your Hostname',
                },
                ram: {
                    required : 'Please Enter Your Ram',
                },
                hardisk: {
                    required : 'Please Enter Your hardisk',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>
<!-- Responsive Table js -->
<script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/table-responsive.init.js"></script>

@endsection
