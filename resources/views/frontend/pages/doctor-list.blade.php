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
                    <div class="col-sm-4">
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
                    <div class="col-sm-5">
                        <input type="text"
                            id="search" class="form-control" name="search"
                            placeholder="Search" tabindex="1" value="{{ $search }}">
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

            @foreach ($doctors as $doctor)
            <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start">
                    <div class="pic"><img src="/storage/{{ $doctor->photo_profile }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                    <h4>{{ $doctor->name }}</h4>
                    <span>{{ $doctor->doctorCategory->name }}</span>
                    <a href="{{ route('schedule-show', $doctor->id) }}" class="btn btn-primary">Lihat Jadwal</a>
                    </div>
                </div>
            </div>
            @endforeach

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
    <link rel="stylesheet" type="text/css" href="/admin/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@push('prepend-script')
    <script src="/admin/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/admin/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endpush

@push('append-script')
    <script src="/admin/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/js/custom-delete.js"></script>
@endpush
