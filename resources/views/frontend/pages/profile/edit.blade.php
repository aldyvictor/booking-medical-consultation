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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Success</h4>
                            <div class="alert-body">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="pic">
                                @if (auth()->user()->avatar)
                                <img src="../../../storage/{{ auth()->user()->avatar }}" class="img-fluid" alt="" id="photo_profile_review">
                                @else
                                <img src="/img/user.png" class="img-fluid" alt="" id="photo_profile_review">
                                @endif
                            </div>
                            <div>
                                <input id="photo_profile" name="avatar" class="btn btn-sm btn-primary w-75 mb-75 mt-3    me-75 waves-effect waves-float waves-light" type="file" accept="image/*" tabindex="0">
                                <p class="mb-0">Allowed file types: png, jpg,
                                    jpeg.</p>
                                <p class="mb-0 text-danger">Optimal Image Resolution 600 x 600 and Max. 1MB</p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="member-info">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="text-gray-800">Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="text-gray-800">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="phone_number" class="text-gray-800">No HP</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{ auth()->user()->phone_number }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="gender" class="text-gray-800">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-select">
                                            @php
                                                $val = old('gender', auth()->user()->gender)
                                            @endphp
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki" {{ $val == 'Laki-laki' ? 'selected' : '' }} >Laki-laki</option>
                                            <option value="Perempuan" {{ $val == 'Perempuan' ? 'selected' : '' }} >Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="address" class="text-gray-800">Alamat</label>
                                        <textarea class="form-control" name="address" rows="5" placeholder="Alamat">{!! auth()->user()->address !!}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password" class="text-gray-800">Password Baru</label>
                                        <input type="password" class="form-control" name="password" value="">
                                        <small>Kosongkan jika tidak ingin di ganti</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="repassword" class="text-gray-800">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="repassword" value="">
                                        <small>Kosongkan jika tidak ingin di ganti</small>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-block btn-primary">Simpan</button>
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
                    </form>
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

@push('append-script')
    <script src="/admin/app-assets/vendors/js/vendors.min.js"></script>
@endpush

@push('append-script')
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
