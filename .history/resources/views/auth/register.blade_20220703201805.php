@extends('auth.layouts.app')

@section('title', 'Registration')

@section('content')
<div class="row justify-content-center">

    <div class="text-center mt-5">
        <img class="logo-wrapper" src="{{ asset('images/kodimas_logo.png') }}" alt="KodiMas Logo" />
        {{-- <h1 class="text-white">Member Portal</h1> --}}
    </div>

    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Borang Pendaftaran</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="name" class="col-form-label text-md-end">{{ __('Nama') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="col-form-label text-md-end" for="dob">Tarikh Lahir</label>
                                            <input min="1920-01-01" max="2001-12-31 @error('dob') is-invalid @enderror" name="dob" id="dob" type="date" class="form-control" placeholder=""/>
                                        </div>

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="idType">Jenis ID <span class="text-red">*</span></label>
                                            <select class="select form-control" id="idType" name="id_type"  value="{{ old('id_type') }}" required>
                                                <option value="F">Polis</option>
                                                <option value="M">Askar</option>
                                                <option value="N" selected>IC Baharu</option>
                                                <option value="O">Lain-lain</option>
                                            </select>
                                        </div>

                                        @error('id_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-outline">
                                            <label class="form-label" for="idNo">Nombor ID <span class="text-red">*</span></label>
                                            <input type="text" id="idNo" name="id_no" class="form-control" value="{{ old('id_no') }}" required/>
                                        </div>

                                        @error('id_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Daftar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
