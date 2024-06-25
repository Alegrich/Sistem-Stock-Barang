
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form class="card card-md border-0 rounded-3"  action="{{ route('login.submit') }}" method="POST">
    @csrf
    <div class="card-body">
        <h3 class="text-center mb-3 font-weight-medium">Login</h3>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email anda" name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan kata sandi anda" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Regist Akun</a>
        </div>
    </div>
</form>

{{-- @extends('layouts/sections/blank')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to Aplikasi Stock Barang! 👋</h4>

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukan email anda" name="email" id="email" autofocus>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukan kata sandi anda" name="password" id="password" aria-describedby="password" />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>Belum Terdaftar?</span>
            <a href="{{ route('register') }}">
              <span>Register Akun</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection --}}
