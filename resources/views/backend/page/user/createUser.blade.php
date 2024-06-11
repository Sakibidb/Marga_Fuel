@extends('backend.layout.app')
@section('title', 'E-Commerce Site')
@section('content')
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">Create User</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        {{-- main content start from here --}}
        <div class="page-content">
            <div class="row">

                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title"> <i class="fa fa-pencil-square-o"></i> Users
                            </h4>
                            <span class="widget-toolbar">
                            </span>
                        </div>


                        <form class="form-horizontal" action="{{ route('createUser') }}" method="POST">
                            @csrf

                            <div class="widget-body">

                                <div class="row pt-2 pr-2">

                                    <!-- Left side -->
                                    <div class="col-sm-12">

                                        <div class="row">
                                            <div class="col-sm-12 px-3">

                                                <!-- Role Dropdown -->
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Role <span class="label-required">*</span>
                                                        </span>
                                                        <select class="form-control" name="role" id="role">
                                                            <option value="1">Admin</option>
                                                            <option value="2">Customer</option>
                                                            <option value="3">Driver</option>
                                                        </select>
                                                        @error('role')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Name -->
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Name <span class="label-required">*</span>
                                                        </span>
                                                        <input type="text" class="form-control " name="name" id="name" placeholder="Name">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <!-- Email -->
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Email <span class="label-required">*</span>
                                                        </span>
                                                        <input type="email" class="form-control " name="email" id="email" placeholder="Email">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Mobile <span class="label-required">*</span>
                                                        </span>
                                                        <input type="mobile" class="form-control " name="mobile" id="mobile" placeholder="mobile">
                                                        @error('mobile')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            NID/ Driving Licence <span class="label-required">*</span>
                                                        </span>
                                                        <input type="nid" class="form-control " name="nid" id="nid" placeholder="nid">
                                                        @error('nid')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Address <span class="label-required">*</span>
                                                        </span>
                                                        <input type="address" class="form-control " name="address" id="address" placeholder="address">
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                    

                                                <!-- Password -->
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Password <span class="label-required">*</span>
                                                        </span>
                                                        <input type="password" class="form-control " name="password" id="password" placeholder="Password" value="{{ old('password') }}">
                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6">
                                                    <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Profile Pic <span class="label-required">*</span>
                                                        </span>
                                                        <input type="file" class="form-control" id="image" name="image"
                                                            accept="image/*">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-xs-12">

                                        <!-- Add Page -->
                                        <h5 class="widget-title">
                                            <div class="row" style="margin-top: 10px;padding:5px">

                                                <div class="col-md-12 text-right pr-2">
                                                    <button type="submit" class="btn btn-primary btn-sm btn-block" style="max-width: 150px">
                                                        <i class="fa fa-save"></i> Create
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="space-10"></div>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        {{-- main content end  --}}
    </div>
{{-- </div>
<script>
    function createUser() {
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let role = document.getElementById("role").value;

        if (name === "") {
            alert("Write your name")
        } else if (email === "") {
            alert("Write your email")
        } else if (password === "") {
            alert("Write password");
        } else {
            let post_url = "/createUser";
            let allData = new FormData();
            allData.append("Name", name);
            allData.append("Email", email);
            allData.append("Password", password);

            let configuration = {
                headers: {
                    "content-type": "multipart/form-data"
                }
                , onUploadProgress: function(progressEvent) {
                    let uploadProgressPercent = Math.round((progressEvent.loaded * 100) / progressEvent.total)
                    document.getElementById("uploadPercent").innerHTML = uploadProgressPercent + '%';
                }
            };

            axios.post(post_url, allData, configuration).then(
                function(response) {
                    if (response.data == 2) {
                        alert("Name already exist");
                    } else if (response.data == 1) {
                        alert("Email already exist");
                    } else {
                        alert("New User Created");
                        location.href = "/user";
                    }
                }
            ).catch(
                function(error) {
                    alert("Error...try again");
                    location.reload();
                }
            )
        }
    }

</script> --}}
@endsection
