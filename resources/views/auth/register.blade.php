@extends('layouts/auth')
@section('konten')
@section('title','Register')
@section('title_header','Buat Akun Baru')

<form method="post" action="/register/submit">
    @csrf
    <div class="form-group mb-3">
        <label class="small mb-1" for="inputNama">Nama Lengkap</label>
        <input class="form-control" id="inputNama" type="text" placeholder="Masukkan nama lengkap Anda" name="name" required />
    </div>

    <div class="form-group mb-3">
        <label class="small mb-1" for="inputEmail">Alamat Email</label>
        <input class="form-control" id="inputEmail" type="email" placeholder="Masukkan alamat email aktif" name="email" required />
    </div>

    <div class="form-group mb-4">
        <label class="small mb-1" for="inputPassword">Kata Sandi</label>
        <input class="form-control" id="inputPassword" type="password" placeholder="Buat kata sandi minimal 6 karakter" name="password" required />
    </div>

    <button class="btn btn-primary w-100 mt-2" name="register">Daftar Sekarang</button>
</form>
@endsection

@section('footer')
<div class="card-footer text-center py-3">
    <div class="small">Sudah punya akun? <a href="login">Masuk di sini</a></div>
</div>
@endsection
