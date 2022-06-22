@extends('frontend.layout.frontend-master')

@section('title')
    Home - Klinik Sehat
@endsection

@section('content')

<main id="main">

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors" style="padding-top: 7rem">
        <div class="container">

        <div class="section-title">
            <h2>Dokter</h2>
            <p>Temukan Dokter yang kamu ingin buat janji temu</p>
        </div>

        <div class="col-6">
            <form action="?" method="get" class="ms-auto">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <input value="{{ old('date', '') }}" name="date" type="text"
                        id="fp-default" required class="form-control bg-white flatpickr-basic flatpickr-input" tabindex="1" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light"
                        id="submit"><i data-feather='search'></i> Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">

            <div class="col-lg-12 mt-4">
                <div class="row">
                    <div class="col-4">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="/storage/{{ $doctor->photo_profile }}" class="img-fluid" alt=""></div>
                            <div class="member-info">
                            <h4>{{ $doctor->name }}</h4>
                            <span>{{ $doctor->doctorCategory->name }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="member d-flex align-items-start">
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
                                @foreach ($schedules as $key => $schedule)
                                    <tr role="row" class="odd">
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td>
                                            <span class="avatar me-1 align-bottom">
                                                @if ($schedule->doctor->photo_profile)
                                                <img class="round" src="../../../storage/{{ $schedule->doctor->photo_profile }}" alt="avatar" height="40" width="40">
                                                @else
                                                <img class="round" src="../../../img/user.png" alt="avatar" height="40" width="40">
                                                @endif
                                            </span>
                                            <span class="d-inline-block">
                                                <b>{{ $schedule->doctor->name }}</b> <br>
                                                <small>{{ $schedule->doctor->doctorCategory->name }}</small>
                                            </span>
                                        </td>
                                        <td>
                                            {{ date('l ,d F Y', strtotime($schedule->date)) }}
                                        </td>
                                        <td>
                                            <b>{{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}</b>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex">
                                                <a class="btn btn-warning" href="{{ route('appointment-create', $schedule->id) }}"><i class="bi bi-calendar"></i> Buat Janji</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

        <div class="section-title">
            <h2>Kontak</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        </div>

        <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container">
        <div class="row mt-5">

            <div class="col-lg-4">
            <div class="info">
                <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
                </div>

                <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
                </div>

            </div>

            </div>

        </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

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
    <script src="/admin/app-assets/vendors/js/vendors.min.js"></script>
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
