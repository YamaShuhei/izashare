@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 mt-5 p-0 shadow-lg">
            <div class="card">
                <p class="card-header fw-bold fs-4">{{ isset($authgroup) ? '管理者' : ""}} {{ __('ログイン') }}</p>

                <div class="card-body">
                    @isset($authgroup)
                    <form method="POST" action="{{ url("login/$authgroup") }}">
                    @else
                    <form method="POST" action="{{ route('login') }}">
                    @endisset
                        @csrf

                        <div class="row my-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end fw-bolder">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="info@example.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end fw-bolder">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('パスワードを記憶する') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary rounded-pill start-50">
                                    {{ __('　　ログイン　　') }}
                                </button>
                            </div>
                            <div>
                                @isset($authgroup)
                                @else
                                <div class="mt-2 text-end">
                                    新規登録は<a class="fs-5" href="{{ route('register') }}">こちら</a>
                                </div>
                                @endisset
                            </div>
                        </div>
                        <div>

                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
