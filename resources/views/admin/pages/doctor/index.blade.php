@extends('admin.layouts.master-admin')

@section('title')
    Data Doctor
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Doctor</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor
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
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Success</h4>
                                <div class="alert-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Danger</h4>
                                <div class="alert-body">
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header border-bottom">
                                <a class="btn btn-primary" href="{{ route('doctor.create') }}"><i
                                        data-feather='plus'></i> Add Doctor</a>
                                <div class="col-9">
                                    <form action="?" method="get" class="ms-auto">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="position-relative">
                                                    <select class="select2 form-select select2-hidden-accessible"
                                                        name="doctor_category" id="select3-basic" data-select2-id="select3-basic"
                                                        tabindex="3" aria-hidden="true">
                                                        <option value="">Choose Category :</option>
                                                        @foreach ($doctorCategories as $doctorCategory)
                                                            <option value="{{ $doctorCategory->name }}" {{ $doctorCategory->name == $searchCategory ? 'selected' : '' }}>{{ $doctorCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text"
                                                    id="search" class="form-control" name="search"
                                                    placeholder="Search" tabindex="1" value="{{ $search }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit"
                                                class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                id="submit"><i data-feather='save'></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-datatable">
                                <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap5 px-1">
                                    <form action='/admin/faq-categories-order' method="POST"
                                        class="mt-1">
                                        @csrf
                                        <table class="dt-responsive table dataTable dtr-column collapsed"
                                            id="DataTables_Table_3" role="grid"
                                            aria-describedby="DataTables_Table_3_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center" style="width: 15%">#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th class="text-center" style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctors as $key => $doctor)
                                                    <tr role="row" class="odd">
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td>
                                                            <span class="avatar me-1 align-bottom">
                                                                <img class="round" src="{{ Storage::url($doctor->photo_profile) }}" alt="avatar" height="40" width="40">
                                                            </span>
                                                            <span class="d-inline-block">
                                                                <b>{{ $doctor->name }}</b> <br>
                                                                <small>{{ $doctor->gender }}</small>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <b>{{ $doctor->doctorCategory->name }}</b>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-inline-flex">
                                                                <a class="btn btn-warning btn-sm" href="{{ route('doctor.edit', $doctor->id) }}"><i data-feather="edit-3"></i></a>
                                                                <a href="#" data-id="{{ $doctor->id }}" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="btn btn-sm btn-danger ms-1 delete">
                                                                    <i data-feather="trash-2"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="delete_form"></div>
</div>

{{-- Modal Delete --}}

<div class="modal fade modal-danger text-start show" id="confirm-delete" tabindex="-1" aria-labelledby="myModalLabel120"
    style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctor.delete') }}" method="POST">
                @csrf
                <input id="id" name="id" hidden>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus data ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect waves-float waves-light"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('prepend-script')
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('append-script')
    <script src="/admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/js/custom-delete.js"></script>
@endpush

