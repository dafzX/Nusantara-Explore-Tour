@extends('layouts.dashboard')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Pesan Contact Us</h1>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $contact->email }}" 
                               target="_blank" 
                               class="btn btn-success btn-sm">
                                <i class="bi bi-reply-fill"></i> Balas
                            </a>
                            <a href="{{ route('contact.hapus', $contact->id) }}"
                               onclick="return confirm('Yakin mau hapus pesan ini?')"
                               class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada pesan masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
