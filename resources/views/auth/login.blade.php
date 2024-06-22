
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form class="card card-md border-0 rounded-3" action="{{ route('login') }}" method="POST">
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
