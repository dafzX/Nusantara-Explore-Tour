@extends("layouts/app")
@section("konten")
  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">Contact Us</h1>
            <p class="text-white">Punya pertanyaan atau ingin booking paket tour? Tim kami siap membantu! Silakan hubungi kami melalui WhatsApp, telepon, atau email untuk informasi lebih lanjut, konsultasi perjalanan, atau pemesanan. Kami tersedia setiap hari kerja dan siap melayani Anda dengan cepat dan ramah.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="contact-form" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fname">First name</label>
                  <input type="text" class="form-control" id="fname">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-black" for="email">Email address</label>
              <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
              <label class="text-black" for="message">Message</label>
              <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>
        <div class="col-lg-5 ml-auto">
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-house"></span>
            <address class="text">
              Jl. Soekarno Hatta No.123, Bandar Lampung, Lampung
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-phone-call"></span>
            <address class="text">
              +62-812-3456-7890
            </address>
          </div>
          <div class="quick-contact-item d-flex align-items-center mb-4">
            <span class="flaticon-mail"></span>
            <address class="text">
              nusantaraexplore@gmail.com
            </address>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection