@extends('homepage.template.apphomepage')

@section('title', 'Lacak Paket')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include SweetAlert CSS and JS from CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

{{-- <main id="main"> --}}
    <section class="section" data-aos="zoom-in" data-aos-delay="200">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 me-auto">
                    <h2 class="mb-12 text-center mt-4 fw-bold" style="font-family: 'Josefin Sans', sans-serif;">LACAK PAKETMU DISINI</h2>
                    <div class="col-md-12">
                            <input type="text" class=" border-5 form-control" id="kode" required>
                            <input type="submit" class="btn btn-primary btn-lg d-block mt-5  mx-auto rounded-3 fw-light" style="margin-bottom: 13%;" name="proses" value="Cek" onclick="cek()">
                    </div>
                    <div style="margin-top: -5rem" id="cn" class=" d-none " data-aos-delay="200">
                      <h2 class="text-center" data-aos="fade-up">Informasi Paket Anda</h2>
                      <div class="col-md-12 mb-5 mt-5 mb-md-0" data-aos="fade-up">
                        <div class="row">
                          <div class="col-md-12 form-group">
                            <label  class="fw-bold text-primary ">Status Paket Anda Sekarang</label>
                            <input type="text" name="name" class="form-control" id="status"  readonly>
                          </div>
                          <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label  class="fw-bold text-primary ">nama Penerima</label>
                            <input type="email" class="form-control" name="email" id="nama" readonly>
                          </div>
                          <div class="col-md-6 form-group mt-3 mt-md-0 ">
                            <label  class="fw-bold text-primary ">tanggal</label>
                            <input type="text" class="form-control" name="subject" id="tanggal" readonly>
                          </div>
                          <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label class="fw-bold text-primary ">layanan</label>
                            <input type="text" class="form-control"  name="subject" id="layanan" readonly>
                          </div>
                          <div class="col-md-6 form-group mt-3 mt-md-0">
                            <label  class="fw-bold text-primary ">Tujuan Pengiriman</label>
                            <input type="text" class="form-control" name="subject" id="tujuan" readonly>
                          </div>
                        </div>
                      </div>
                    </div> 
              </div>
                </div>
            </div>
        </div>
           
    </section>
    <script>
function cek(){
  var settings = {
  "url": "https://peserta31.msib5.hendevane.com/TrackMyShipment/public/api/lacak",
  "method": "GET",
  "timeout": 0,
  "headers": {
    "Accept": "application/json",
    "Content-Type": "application/json"
  },
};
Swal.fire({
      title: 'Loading...',
      showConfirmButton: false,
      showCancelButton: false,
      allowOutsideClick: false,
      allowEscapeKey: false,
      onBeforeOpen: () => {
        Swal.showLoading();
        // Panggil AJAX setelah simulasi waktu loading
        $.ajax(settings).done(function (response) {
          // Setelah AJAX selesai, sembunyikan SweetAlert
          Swal.close();
          var h = response.data;
          var input = $('#kode').val();
          console.log(input);

          var kondisi = false;
          $('#default').empty();

          for (var i = 0; i < h.length; i++) {
            if (h[i].kode == input) {
              $('#cn').removeClass("d-none");
              $('#nama').val(h[i].penerima);
              $('#tanggal').val(h[i].tanggal);
              $('#layanan').val(h[i].layanan);
              $('#status').val(h[i].status);
              $('#tujuan').val(h[i].lokasi_tujuan);
              kondisi = true;
            };
          }

          if (!kondisi) {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Nomor resi tidak ditemukan",
            });
          }
        });
      }
    });
};
    
    </script>
{{-- </main> --}}
@endsection