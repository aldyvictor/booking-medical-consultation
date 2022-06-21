@extends('admin.layouts.master-admin')

@section('title')
    Create Customer
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Form Customer</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Form Customer
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
                            <div class="card">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('doctor-category.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label" for="photo_profile">Photo Profile</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="d-flex mb-1">
                                                                <img src="{{ old('photo_profile', '../../../img/file-upload.png') }}"
                                                                    id="photo_profile_review"
                                                                    class="uploadedAvatar rounded me-50 border-3"
                                                                    alt="profile image" height="100" width="100"
                                                                    style="border-style: dashed">
                                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                                <div>
                                                                    <input id="photo_profile" name="photo_profile" class="btn btn-sm btn-primary mb-75 me-75 waves-effect waves-float waves-light" type="file" accept="image/*" tabindex="0">
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
                                                        <label class="col-form-label" for="name">Name<b class="text-danger">*</b></label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" value="{{ old('name', '') }}"
                                                            id="name" class="form-control" name="name"
                                                            placeholder="Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="email">Email<b class="text-danger">*</b></label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="email" value="{{ old('email', '') }}"
                                                            id="email" class="form-control" name="email"
                                                            placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="phone_number">Phone Number<b class="text-danger">*</b></label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" name="phone_number" value="{{ old('phone_number', '') }}" class="form-control prefix-mask" id="prefix" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                    id="submit"><i data-feather='save'></i> Save</button>
                                                <a href="{{ route('doctor-category.index') }}"
                                                    class="btn btn-warning waves-effect">Back to List</a>
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
