@extends('frontend.layout.frontend-master')

@section('title')
    Home - Klinik Sehat
@endsection

@section('content')

<main id="main">

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors" style="padding-top: 7rem">
        <div class="container">

        {{-- <div class="section-title">
            <h2>Dokter</h2>
            <p>Temukan Dokter yang kamu ingin buat janji temu</p>
        </div> --}}

        <div class="row">

            <div class="col-lg-12 mt-4 mt-lg-0">
                <div class="member d-block align-items-start">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="pic"><img src="/frontend/assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
                        </div>
                        <div class="col-lg-9">
                            <div class="member-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                {{-- <h4>Sarah Jhonson</h4>
                                <span>Anesthesiologist</span>
                                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div> --}}
                            </div>
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
