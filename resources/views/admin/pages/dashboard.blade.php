@extends('admin.layouts.master-admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Dashboard</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard
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
                <section id="statistics-card">
                    <div class="row match-height">
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                            <a href="{{ route('doctor-category.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-primary me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="file-text" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $doctorCategory->count() }}</h4>
                                                        <p class="card-text text-black font-small-3 mb-0"><b>Doctor Category</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
                                            <a href="{{ route('doctor.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="users" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $doctor->count() }}</h4>
                                                        <p class="card-text text-black font-small-3 mb-0"><b>Doctor</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <a href="{{ route('schedule-doctor.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-danger me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="calendar" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $scheduleDoctor->count() }}</h4>
                                                        <p class="card-text text-black font-small-3 mb-0"><b>Doctor Schedule</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ route('customer.index') }}">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-success me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="users" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0">{{ $customer->count() }}</h4>
                                                        <p class="card-text text-black font-small-3 mb-0"><b>Customer</b></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section id="dashboard-ecommerce">
                            <div class="row match-height">
                                <!-- Revenue Report Card -->
                                <div class="col-lg-12 col-12">
                                    <div class="card card-revenue-budget">
                                        <div class="row mx-0">
                                            <div class="col-12 revenue-report-wrapper">
                                                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Daily Visitor</h4>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center me-2">
                                                            <span
                                                                class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                            <span>Visitors</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="revenue-report-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Revenue Report Card -->
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>

    </div>
@endsection


@push('append-style')
    <link rel="stylesheet" type="text/css" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
@endpush

@push('append-script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="/admin/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/admin/app-assets/vendors/js/extensions/toastr.min.js"></script> --}}
    <!-- END: Page Vendor JS-->

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@endpush
