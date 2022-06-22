@extends('frontend.layout.frontend-master')

@section('title')
    Home - Klinik Sehat
@endsection

@section('content')

<main id="main">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg" style="padding-top: 7rem">
        <div class="container">

        <div class="section-title">
            <h2>Buat Janji Temu</h2>
            <p>Buat janji temu dengan mudah hanya dengan mengisi for di bawah dan pilih jadwal sesukamu</p>
        </div>

            <form action="{{ route('appointment-store') }}" method="post">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name">Nama</label>
                    <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" readonly>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="phone_number">No Telepon</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->phone_number }}" name="phone_number" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4 form-group">
                    <label for="doctor_name">Nama Dokter</label>
                    <input type="text" value="{{ $schedule->doctor->name }} - {{ $schedule->doctor->doctorCategory->name }}" name="doctor_name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="session">Sesi</label>
                    <input type="text" class="form-control" value="{{ $schedule->start_time }} - {{ $schedule->end_time }}" name="session" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" readonly>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <label for="date">Tanggal</label>
                    <input type="text" class="form-control" value="{{ date('l, d F Y', strtotime($schedule->date)) }}" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" readonly>
                </div>
                </div>

                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Pesan/Keluhan ( Opsional )"></textarea>
                </div>
                <div class="text-center"><button class="btn btn-primary mt-3" type="submit">Buat Janji Temu</button></div>
            </form>

        </div>
    </section><!-- End Appointment Section -->

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
