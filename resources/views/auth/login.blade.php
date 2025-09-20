@extends('layouts/auth')
@section('konten')
@section('title','Login')
@section('title_header','Login')

<form method="post" action="/login/submit">
    @csrf
    <div class="form-floating mb-3">
        <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
        <label for="inputEmail">Email address</label>
    </div>
    <div class="form-floating mb-4">
        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
        <label for="inputPassword">Password</label>
    </div>
    <button class="btn btn-primary w-100">Login</button>
</form>

@endsection

@section('footer')
<div class="card-footer text-center py-3">
    <div class="small">Need an account? <a href="register">Sign up!</a></div>
</div>
@endsection
