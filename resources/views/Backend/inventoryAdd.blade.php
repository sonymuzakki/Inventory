@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Inventory add Page</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms Inventaris</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('invetaris.store') }}" enctype="multipart/from-data" id="myForm">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">User</label>
                        <div class="form-group col-sm-10">
                            <select name="user_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                               @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="form-group col-sm-10">
                            <select name="lokasi_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($lokasi as $l)
                                <option value="{{ $l->id }}">{{ $l->lokasi }}</option>
                               @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Divisi</label>
                        <div class="form-group col-sm-10">
                            <select name="divisi_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($divisi as $d)
                                <option value="{{ $d->id }}">{{ $d->divisi }}</option>
                               @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis</label>
                        <div class="form-group col-sm-10">
                            <select name="jenis_id" class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->jenis }}</option>
                               @endforeach
                                </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                        <div class="form-group col-10">
                            <input name="hostname" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Merk</label>
                        <div class="form-group col-10">
                            <input name="merk" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Processor</label>
                        <div class="form-group col-10">
                            <input name="Processor" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">RAM</label>
                        <div class="form-group col-10">
                            <input name="ram" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Grafik</label>
                        <div class="form-group col-10">
                            <input name="grafik" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">SSD</label>
                        <div class="form-group col-10">
                            <input name="ssd" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">OS</label>
                        <div class="form-group col-10">
                            <input name="os" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Office</label>
                        <div class="form-group col-10">
                            <input name="Office" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">AkunOffice</label>
                        <div class="form-group col-10">
                            <input name="akunOffice" class="form-control" type="text" placeholder="" id="text">
                        </div>
                    </div>
                    <!-- end row -->



                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Inventory">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>
{{--  <script type="text/javascript">
    $(document).ready(function(){
        $('#myform').validate({
            rules:{
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
            messages : {
                hostname : {
                    required : 'Please enter your name'
                },
                ram : {
                    required : 'Please enter your ram'
                },
                hardisk : {
                    required : 'Please enter your hardisk'
                },
            },
            errorElement : 'span'
            errorPlacement : function (error,element) {
                error.addClass('invalid--feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element , errorClass , validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element,errorClass,validClass){
                $(element).removeClass('is-invalid')
            },
        });
    });
</script>  --}}

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

@endsection
