@extends('admin.layouts.master-admin')

@section('title')
    Data Doctor Schedule
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Doctor Schedule</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Doctor Schedule
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
                                {{-- <a class="btn btn-primary" href="{{ route('schedule-doctor.create') }}"><i
                                        data-feather='plus'></i> Add Doctor Schedule</a>
                                <div class="col-9">
                                    <form action="?" method="get" class="ms-auto">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="position-relative">
                                                    <select class="select2 form-select select2-hidden-accessible"
                                                        name="doctor_category" id="select3-basic" data-select2-id="select3-basic"
                                                        tabindex="3" aria-hidden="true">
                                                        <option value="">All Category :</option>
                                                        @foreach ($doctorCategories as $doctorCategory)
                                                            <option value="{{ $doctorCategory->name }}" {{ $doctorCategory->name == $searchCategory ? 'selected' : '' }}>{{ $doctorCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text" id="basic-addon5"
                                                        style="padding: 0.571rem 0.5rem"><i
                                                            data-feather='calendar'></i></span>
                                                    <input value="{{ $searchDate }}" name="date" type="text"
                                                        id="fp-default" required class="form-control bg-white flatpickr-basic flatpickr-input" tabindex="1" placeholder="YYYY-MM-DD">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text"
                                                    id="search" class="form-control" name="search"
                                                    placeholder="Search Doctor" tabindex="1" value="{{ $search }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit"
                                                class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                id="submit"><i data-feather='search'></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
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
                                                    <th style="width: 25%">Name</th>
                                                    <th>Date</th>
                                                    <th style="width: 15%">Session</th>
                                                    <th class="text-center" style="width: 25%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($appointments as $key => $appointment)
                                                <tr role="row" class="odd">
                                                    <td class="text-center">{{ $key + 1 }}</td>
                                                    <td>
                                                        <span class="avatar me-1">
                                                            @if ($appointment->users->avatar)
                                                            <img class="round" src="../../../storage/{{ $appointment->users->avatar }}" alt="avatar" height="40" width="40">
                                                            @else
                                                            <img class="round" src="../../../img/user.png" alt="avatar" height="40" width="40">
                                                            @endif
                                                        </span>
                                                        <span class="d-inline-block">
                                                            <b>{{ $appointment->users->name }}</b> <br>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ date('l ,d F Y', strtotime($appointment->schedules->date)) }}
                                                    </td>
                                                    <td>
                                                        <b>{{ date('H:i', strtotime($appointment->schedules->start_time)) }} - {{ date('H:i', strtotime($appointment->schedules->end_time)) }}</b>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-inline-flex">
                                                            <a href="#" data-id="{{ $appointment->id }}" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="btn btn-sm btn-danger ms-1 delete">
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
            <form action="{{ route('appointment.delete') }}" method="POST">
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
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('append-style')
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/css/plugins/forms/pickers/form-pickadate.css">
@endpush

@push('prepend-script')
    <script src="/admin/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/admin/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('append-script')
    <script src="/admin/app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
    <script src="/admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/js/custom-delete.js"></script>
@endpush
