@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mengesahkan alamat e-mel anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Pautan pengesahan baharu telah dihantar ke alamat e-mel anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum meneruskan, sila semak e-mel anda untuk mendapatkan pautan pengesahan.') }}
                    {{ __('Jika anda tidak menerima e-mel tersebut') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk meminta yang baru') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
