@extends('admin.layouts.master-admin')

@section('title')
    Edit User
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Form User</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Form User
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section id="responsive-datatable">
                    <div class="row">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading">Danger</h4>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert-body">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Success</h4>
                                    <div class="alert-body">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label" for="avatar">Photo Profile</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="d-flex mb-1">
                                                            @if (auth()->user()->avatar)
                                                               <img src="{{ old('avatar', '../../../storage/'.auth()->user()->avatar) }}"
                                                                    id="avatar_review"
                                                                    class="uploadedAvatar rounded me-50 border-3"
                                                                    alt="profile image" height="100" width="100"
                                                                    style="border-style: none">
                                                            @else
                                                            <img src="{{ old('avatar', '../../../../../../img/file-upload.png') }}"
                                                                    id="avatar_review"
                                                                    class="uploadedAvatar rounded me-50 border-3"
                                                                    alt="profile image" height="100" width="100"
                                                                    style="border-style: dashed">
                                                            @endif
                                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                                <div>
                                                                    <input id="avatar" name="avatar" class="btn btn-sm btn-primary mb-75 me-75 waves-effect waves-float waves-light" type="file" accept="image/*" tabindex="0">
                                                                    <p class="mb-0">Allowed file types: png, jpg,
                                                                        jpeg.</p>
                                                                    <p class="mb-0 text-danger">Optimal Image Resolution 600 x 600 and Max. 1MB</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="name">
                                                            Name</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" value="{{ old('name', auth()->user()->name) }}"
                                                            id="name" class="form-control" name="name"
                                                            placeholder="Name" tabindex="1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="email">
                                                            Email</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" value="{{ old('email', auth()->user()->email) }}"
                                                            id="email" class="form-control" name="email"
                                                            placeholder="Email" tabindex="1" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="phone_number">Phone Number</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="phone_number" value="{{ old('phone_number', auth()->user()->phone_number) }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="gender">
                                                            Gender</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="position-relative">
                                                            <select class="select2 form-select select2-hidden-accessible"
                                                                name="gender" id="select2-basic" data-select2-id="select2-basic"
                                                                tabindex="2" aria-hidden="true">
                                                                <option value="">Choose Gender :</option>
                                                                <option value="Laki-laki" {{ auth()->user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                <option value="Perempuan" {{ auth()->user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="address">Address</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3" placeholder="Textarea">{!! auth()->user()->address !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="password">Password</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                       <input type="password" value=""
                                                            id="password" class="form-control" name="password"
                                                            placeholder="Password">
                                                             <small>Empty if you dont need change the password</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="repassword">Password Confirmation</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                       <input type="password" value=""
                                                            id="repassword" class="form-control" name="repassword"
                                                            placeholder="Password Confirmation">
                                                             <small>Empty if you dont need change the password</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                    id="submit"><i data-feather='save'></i> Save</button>
                                                <a href="{{ route('dashboard-admin') }}"
                                                    class="btn btn-warning waves-effect">Back to Dashboard</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection

@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('prepend-script')
    <script src="/admin/app-assets/js/scripts/forms/form-input-mask.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('append-script')
    <script src="/admin/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script>
        //file input preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                            $('#photo_profile_review    ').attr('src', e.target.result).attr('style', 'border-style: none');
                    }
                    reader.readAsDataURL(input.files[0]);
            }
        }
        $("#photo_profile").change(function(){
                readURL(this);
        });
    </script>
@endpush
