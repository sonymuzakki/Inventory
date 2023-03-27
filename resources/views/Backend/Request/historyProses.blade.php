@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Request Handling</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Forms History</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                {{--  <h4 class="mb-4">History add Page</h4>  --}}
                <form method="POST" action="{{ route('history.update', $history->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">User - Jenis </label>
                                <select class="form-control select2" name="inventory_id"disabled>
                                    @foreach ($inventory as $inv)
                                        <option value="{{ $inv->id }}" @if($inv->id == $history->inventory_id) selected @endif>{{ $inv->user->name }} - {{ $inv->jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{--  Laporan  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Laporan</label>
                                <input type="text" name="laporan" value={{ $history->laporan }} class="form-control" id="validationCustom01"
                                    placeholder="Laporan"  required disabled>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Kendala  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Kendala</label>
                                <input type="text" name="kendala" class="form-control" id="validationCustom01"
                                    placeholder="Kendala"  required >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Pengerjaan  --}}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="validationCustom01" class="form-label">Pengerjaan</label>
                                <input type="text" name="pengerjaan" class="form-control" id="validationCustom01"
                                    placeholder="Pengerjaan"  required >
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Internal/External</label>
                                <select class="form-control " name="is_internal" id="is_internal">
                                    <option value="1">Internal</option>
                                    <option value="0">External</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="external-laporan" style="display:none;">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">External Laporan</label>
                                <textarea class="form-control" name="eks_history_"></textarea>
                            </div>
                        </div>
                    </div>

                <input type="submit" class="btn btn-info waves waves-effect waves-light" value="Submit">
                </form>
                <!-- end row -->
            </div>
        </div>
    </div> <!-- end col -->
</div>

<script>
    $(document).ready(function() {
        $("#is_internal").change(function() {
            if ($("#is_internal option:selected").val() == "0") {
                $("#external-laporan").show();
            } else {
                $("#external-laporan").hide();
            }
        });
    });
</script>

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
