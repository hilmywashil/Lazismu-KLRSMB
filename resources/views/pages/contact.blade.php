@extends('partials.layout')

@section('content')
<main id="main" class="py-5">
  <!-- ======= Contact Info Section ======= -->
  <div class="container">
    <div class="section-title text-center mb-5" data-aos="fade-up">
      <h2 class="fw-bold">Hubungi Kami</h2>
      <p class="text-muted">Temukan informasi kontak kami di bawah ini</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 text-center shadow-sm border-0">
          <div class="card-body">
            <i class="bi bi-geo-alt icon-style fs-1 text-primary mb-3"></i>
            <h5 class="card-title">Alamat</h5>
            <p class="card-text">Jalan XYZ No.123, Kota Bandung</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card h-100 text-center shadow-sm border-0">
          <div class="card-body">
            <i class="bi bi-telephone icon-style fs-1 text-primary mb-3"></i>
            <h5 class="card-title">Telepon</h5>
            <p class="card-text">0853-4567-3899</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
        <div class="card h-100 text-center shadow-sm border-0">
          <div class="card-body">
            <i class="bi bi-phone icon-style fs-1 text-primary mb-3"></i>
            <h5 class="card-title">No HP</h5>
            <p class="card-text">+62 8567 2877 222</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="card h-100 text-center shadow-sm border-0">
          <div class="card-body">
            <i class="bi bi-envelope icon-style fs-1 text-primary mb-3"></i>
            <h5 class="card-title">Email</h5>
            <p class="card-text">info@rsmbandung.org</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Info Section -->

  <!-- ======= Google Maps Section ======= -->
  <div class="container mt-5" data-aos="fade-up" data-aos-delay="500">
    <div class="text-center mb-3">
      <i class="bi bi-map icon-style fs-1 text-success"></i>
      <h4 class="fw-semibold mt-2">Lokasi Kami</h4>
    </div>
    <div class="ratio ratio-16x9 rounded-4 shadow">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17805.612238599082!2d107.61528638922135!3d-6.932896422096376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e87ddb7a5863%3A0x17cc7ee41569932a!2sRumah%20Sakit%20Muhammadiyah%20Bandung!5e0!3m2!1sid!2sid!4v1736407803282!5m2!1sid!2sid"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
  <!-- End Google Maps Section -->
</main>
@endsection
