@extends('frontend.layout.frontend-master')

@section('title')
    Home - Klinik Sehat
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
<div class="container">
    <h1>Selamat Datang di Klinik Sehat</h1>
    <h2>Klinik Sehat membantu anda untuk<br> membuat janji temu dengan dokter yang anda inginkan</h2>
    @auth
        <a href="#" class="btn-get-started scrollto">Buat Janji</a>
    @else
        <a href="{{ route('register') }}" class="btn-get-started scrollto">Buat Akun dan Buat Janjimu</a>
    @endauth
</div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
                <h3>Mengapa Klinik Sehat?</h3>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                </p>
                <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                    </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Ullamco laboris ladore pan</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                    </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                    </div>
                </div>
                </div>
            </div><!-- End .content-->
            </div>
        </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6">
            <div class="count-box">
                <i class="fas fa-user-md"></i>
                <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
                <p>Dokter</p>
            </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
                <i class="far fa-hospital"></i>
                <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kategori Dokter/Spesialis</p>
            </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
                <i class="fas fa-flask"></i>
                <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pelanggan</p>
            </div>
            </div>


        </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
        <div class="container">

        <div class="section-title">
            <h2>Buat Janji Temu</h2>
            <p>Buat janji temu dengan mudah hanya dengan mengisi for di bawah dan pilih jadwal sesukamu</p>
        </div>

        @auth
            <form action="" method="post" role="form" class="php-email-form">
                <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" value="{{ old('name', auth())->user()->name }}" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="department" id="department" class="form-select">
                    <option value="">Select Department</option>
                    <option value="Department 1">Department 1</option>
                    <option value="Department 2">Department 2</option>
                    <option value="Department 3">Department 3</option>
                    </select>
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="doctor" id="doctor" class="form-select">
                    <option value="">Select Doctor</option>
                    <option value="Doctor 1">Doctor 1</option>
                    <option value="Doctor 2">Doctor 2</option>
                    <option value="Doctor 3">Doctor 3</option>
                    </select>
                    <div class="validate"></div>
                </div>
                </div>

                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                <div class="validate"></div>
                </div>
                <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Make an Appointment</button></div>
            </form>
        @else
        <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <input type="datetime" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="department" id="department" class="form-select">
                    <option value="">Select Department</option>
                    <option value="Department 1">Department 1</option>
                    <option value="Department 2">Department 2</option>
                    <option value="Department 3">Department 3</option>
                    </select>
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="doctor" id="doctor" class="form-select">
                    <option value="">Select Doctor</option>
                    <option value="Doctor 1">Doctor 1</option>
                    <option value="Doctor 2">Doctor 2</option>
                    <option value="Doctor 3">Doctor 3</option>
                    </select>
                    <div class="validate"></div>
                </div>
                </div>

                <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                <div class="validate"></div>
                </div>
                <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Make an Appointment</button></div>
            </form>
        @endauth

        </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

        <div class="section-title">
            <h2>Dokter</h2>
            <p>Temukan Dokter yang kamu ingin buat janji temu</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="/frontend/assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Medical Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="/frontend/assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Anesthesiologist</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="/frontend/assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                <h4>William Anderson</h4>
                <span>Cardiology</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
                </div>
            </div>
            </div>

            <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
                <div class="pic"><img src="/frontend/assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
                <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Neurosurgeon</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                    <a href=""><i class="ri-twitter-fill"></i></a>
                    <a href=""><i class="ri-facebook-fill"></i></a>
                    <a href=""><i class="ri-instagram-fill"></i></a>
                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container">

        <div class="section-title">
            <h2>Gallery</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        </div>

        <div class="container-fluid">
        <div class="row g-0">

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

            <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
                <a href="/frontend/assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="/frontend/assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                </a>
            </div>
            </div>

        </div>

        </div>
    </section><!-- End Gallery Section -->

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
