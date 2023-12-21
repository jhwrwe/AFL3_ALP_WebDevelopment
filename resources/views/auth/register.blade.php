@extends('layouts.template')

@section('layout_content')
    <style>
        .mojito {
            background-color: #fbfff4;
        }
    </style>
    {{-- <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');"> --}}

    <div class="mask d-flex align-items-center h-100 mojito">
        <div class="container h-100">
            <br>
            <br>
            <br>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body p-5">

                            <h2 class="text-uppercase text-center mb-5">Buat Akun</h2>

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required autofocus />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="no_telp">Nomor Telepon</label>
                                    <input id="no_telp" type="text"
                                        class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                        value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>
                                    @error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">E-mail</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Kata Sandi</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password-confirm">Ulangi Kata Sandi</label>
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        class="form-control form-control-lg" required />
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="gender"
                                        class="col form-label text-md-end">{{ __('Choose gender') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="female" />
                                        <label class="form-check-label" for="femaleGender">Perempuan</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="male" />
                                        <label class="form-check-label" for="maleGender">Laki-laki</label>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="photo">Foto Profil</label>
                                    <input type="file" id="photo" name="photo"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        accept="image/jpg, image/png, image/jpeg" onchange="previewImage(this)">
                                    <img class="img-preview img-fluid mb-3 col-sm-5" style="display: none;">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    </div>

    <script>
        function previewImage(input) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result).show();
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
