@extends('admin.admin_master')

@section('admin')

<div class="page-content">
<div class="containter-fluid">

<div class="row">
    <div class="col-lg-4">
        <div class="card"><br><br/>
            <center>
            <img class="rounded-circle avatar-xl" src="assets/images/small/img-5.jpg" alt="Card image cap">
            </center>
            <div class="card-body">
                <h4 class="card-title">Name     : {{ $adminData->name }}</h4>
                <hr>
                <h4 class="card-title">User name : {{ $adminData->username }}</h4>
                </hr>
                <hr>
                <h4 class="card-title">User Email : {{ $adminData->email }}</h4>
                </hr>
                <hr>
                <a href="" class="type="button" class="btn btn-info btn-rounded waves-effect waves-light">Info</button>">Edit Profile</a>
            </hr>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
