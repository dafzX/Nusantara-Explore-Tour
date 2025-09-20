@extends("layouts/app")
@section("konten")
  <!-- Hero Section -->
  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center text-white">
          <div class="intro-wrap">
            <h1 class="mb-3">Contact Us</h1>
            <p class="lead">
              Punya pertanyaan, butuh informasi paket wisata, atau ingin konsultasi perjalanan?  
              Tim <strong>Nusantara Explore</strong> siap membantu Anda dengan cepat dan ramah.  
              Hubungi kami melalui formulir ini atau lewat WhatsApp, telepon, dan email yang tersedia.  
              Kami selalu siap menjawab setiap pertanyaan Anda!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Booking Section -->
  <div class="untree_co-section" style="background-color: #f9f9f9;">
    <div class="container">
      <div class="row">
        
        <!-- Deskripsi -->
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
        <h2 class="mb-4 text-primary">Get In Touch</h2>
        <p class="mb-4">
          Ada pertanyaan, butuh bantuan, atau ingin tahu lebih banyak tentang paket wisata kami?  
          Tim <strong>Nusantara Explore Tour</strong> siap memberikan informasi yang Anda butuhkan  
          dengan cepat dan ramah.
        </p>
        <p>
          Isi formulir di samping untuk mengirimkan pertanyaan atau pesan Anda.  
          Kami akan segera merespons dan membantu merencanakan perjalanan impian Anda.
        </p>
      </div>

        <!-- Form Booking -->
        <div class="col-lg-6" id="formBooking" data-aos="fade-left">
          <form class="contact-form p-4 shadow bg-white rounded" method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group mb-3">
                  <label class="text-black">Nama Depan</label>
                  <input type="text" name="first_name" class="form-control" placeholder="Nama Depan" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group mb-3">
                  <label class="text-black">Nama Belakang</label>
                  <input type="text" name="last_name" class="form-control" placeholder="Nama Belakang" required>
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label class="text-black">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
            </div>

            <div class="form-group mb-3">
              <label class="text-black">Pesan / Permintaan Khusus</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Tulis pesan Anda..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kirim</button>
          </form>
        </div>

      </div>
    </div>
  </div>
@endsection
