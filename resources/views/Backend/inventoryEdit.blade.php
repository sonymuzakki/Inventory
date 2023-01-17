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
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('invetaris.update') }}" enctype="multipart/from-data" id="myForm">
                    @csrf

                <input type="hidden" name="id" value="{{ $inventaris->id }}">

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Hostname</label>
                    <div class="form-group col-8">
                        <input name="hostname" class="form-control" type="text" value="{{ $inventaris->hostname }}" placeholder="" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Ram</label>
                    <div class="form-group col-8">
                        <input name="ram" class="form-control" type="text" value="{{ $inventaris->ram }}" id="text">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="text" class="col-sm-2 col-form-label">Hardisk</label>
                    <div class="form-group col-8">
                        <input name="hardisk" class="form-control" type="text" value="{{ $inventaris->hardisk }}" id="text">
                    </div>
                </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Update Inventory">
                </form>
                <!-- end row -->
            </div>
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

@endsection
