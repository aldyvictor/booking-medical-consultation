@extends('admin.layouts.master-admin')

@section('title')
    Edit Doctor Schedule
@endsection

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Form Doctor Schedule</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Form Doctor Schedule
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
                                    <form class="form form-horizontal" action="{{ route('schedule-doctor.update', $scheduleDoctor->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="doctor_id">
                                                            Doctor</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="position-relative">
                                                            <select class="select2 form-select select2-hidden-accessible"
                                                                name="doctor_id" id="select3-basic" data-select2-id="select3-basic"
                                                                tabindex="0" aria-hidden="true" autofocus required>
                                                                <option value="">Choose Doctor :</option>
                                                                @php
                                                                    $value = old('doctor_id', $scheduleDoctor->doctor_id);
                                                                @endphp
                                                                @foreach ($doctors as $doctor)
                                                                    <option value="{{ $doctor->id }}" {{ $value == $doctor->id ? 'selected' : ''}} >
                                                                        {{ $doctor->name }} - {{ $doctor->doctorCategory->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="date">Date</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text" id="basic-addon5"
                                                                style="padding: 0.571rem 0.5rem"><i
                                                                    data-feather='calendar'></i></span>
                                                            <input value="{{ old('date', $scheduleDoctor->date) }}" name="date" type="text"
                                                                id="fp-default" required class="form-control bg-white flatpickr-basic flatpickr-input" tabindex="1" placeholder="YYYY-MM-DD">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="start_time">Start Time</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text" id="basic-addon5"
                                                                style="padding: 0.571rem 0.5rem"><i data-feather='clock'></i></span>
                                                            <input type="text" name="start_time" value="{{ old('start_time', '') }}" id="fp-time"
                                                                class="form-control text-start bg-white flatpickr-time text-start flatpickr-input" tabindex="2" placeholder="{{ date('H:i', strtotime($scheduleDoctor->start_time)) }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-3">
                                                        <label class="col-form-label" for="end_time">End Time</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text" id="basic-addon5"
                                                                style="padding: 0.571rem 0.5rem"><i data-feather='clock'></i></span>
                                                            <input type="text" name="end_time" value="{{ old('end_time', '') }}" id="fp-time"
                                                                class="form-control text-start bg-white flatpickr-time text-start flatpickr-input" tabindex="3" placeholder="{{ date('H:i', strtotime($scheduleDoctor->end_time)) }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-9 offset-sm-3">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 waves-effect waves-float waves-light"
                                                    id="submit"><i data-feather='save'></i> Save</button>
                                                <a href="{{ route('schedule-doctor.index') }}"
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
@endpush
