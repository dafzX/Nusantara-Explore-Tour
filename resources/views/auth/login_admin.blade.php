@extends('layouts/auth')
@section('konten')
@section('title','Login Admin')
@section('title_header','Login Admin')

<form method="post" action="/login_admin/submit">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" type="email" name="email" placeholder="Email">
        <label>Email</label>
    </div>
    <div class="form-floating mb-3">
        <input class="form-control" type="password" name="password" placeholder="Password">
        <label>Password</label>
    </div>
    <button class="btn btn-primary w-100">Login</button>
</form>

@endsection
