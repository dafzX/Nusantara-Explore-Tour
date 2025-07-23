@extends('layouts/auth')
@section('konten')
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control" id="inputNama" type="text" placeholder="Masukkan Nama Lengkap" name="nama"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Email</label>
                                                <input class="form-control" id="inputEmail" type="email" placeholder="Masukkan Email" name="email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">No Telepon</label>
                                                <input class="form-control" id="inputNoTelepon" type="text" placeholder="Masukkan No. Telepon" name="no_telepon"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" class="form-control py-4"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Username</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Masukkan Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Level</label>
                                                <select name="level" class="form-select py-4">
                                                    <option value="peminjam">Peminjam</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary w-100 mt-3" name="register">Register</button>
                                        </form>
@endsection
@section('footer')
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login">Have an account? Go to login</a></div>
                                    </div>
@endsection
