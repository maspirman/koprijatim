@extends('frontend.user.dashboard.user-master')
@section('style')
    <x-datatable.css/>
@endsection
@section('site-title')
    {{__('Semua Surat')}}
@endsection
@section('section')
 <div class="form-header-wrap margin-bottom-50 d-flex justify-content-between">
     <h3 class="mb-3">{{__('List Surat')}}</h3>
     <a href="{{route('user.letter.new')}}"
        class="btn btn-info btn-sm mb-3 campaign-title" >{{__('Buat Surat Baru')}}</a>
 </div>
  <div class="card">
      <div class="card-body row">
            <div class="col-md-12">
                <h4 class="header-title">
                    <button id="cetakPdfButton" class="btn btn-secondary pull-right mb-3 ml-2">{{__('Export df')}}</button>
                    <a href="{{route('user.letter.all')}}" class="btn btn-info pull-right mb-3">{{__('Kembali')}}</a>
                </h4>
            </div>
      </div>
        <div id="cardToPrint">
                                <!-- Tata letak persuratan -->
                                <div style="margin: 20px 40px;">
                                  <div style="text-align: center;">
                                    <h1>INI KOP SURAT</h1>
                                  </div>
                                  <div style="margin-right: 40px;">
                                    <p>No. : 026.KOPRI-PKC-XXIV.V-04.03.23.D-1.05.2023</p>
                                    <p>Lamp. : 2</p>
                                    <p>Hal. : <b id="judulAsli">PERMOHONAN NARASUMBER</b></p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p>Kepada Yth.</p>
                                    <p><b id="ToWong">Sahabat Harry Nugroho (Chief Research Officer ARC)</b></p>
                                    <p>Di - Tempat</p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p class="mb-1"><i>Assalamu’alaikum Warahmatullah Wabarakatuh</i></p>
                                    <p>
                                      Salam silaturrahim teriring do’a kami sampaikan semoga Sahabat senantiasa 
                                      dalam lindungan-Nya, serta dimudahkan dalam menjalankan aktivitas keseharian. 
                                      Aamiin
                                    </p>
                                    <p class="mt-1">Sehubungan dengan pelaksanaan “<b>KOPRI Development Forum (KDF)</b>” oleh 
                                      KOPRI PKC PMII Jawa Timur bertajuk “Lifelong Learning to Empower Woman”
                                      yang akan diikuti oleh seluruh kader PMII Se-Jawa Timur. Adapun kegiatan ini 
                                      akan dilaksanakan pada:</p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p>Tanggal : Sabtu, 16 September 2023</p>
                                    <p>Pukul : 11.00 – 13.00 WIB</p>
                                    <p>Tempat : Front One Hotel, Pemekasan Jawa Timur</p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p>Dengan ini kami bermaksud untuk memohon Sahabat agar hadir dan menjadi 
                                      Narasumber dengan materi “Penulisan Policy Brief” pada kegiatan tersebut.
                                    </p>
                                    <p>Demikian surat permohonan ini kami buat, atas perhatian, kerjasama dan 
                                      partisipasi Sahabat, kami ucapkan terima kasih.</p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p><i>
                                      Wallahul Muwaffiq Ilaa Aqwamith Thoriq 
                                    </i></p>
                                    <p><i>Wassalamu’alaikum Warahmatullah Wabarakatu</i></p>
                                  </div>
                                  <div style="margin-left: 40px;">
                                    <p>Surabaya, 10 Agustus 2023</p>
                                    <p>Panitia Pelaksana</p>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 mt-4" style="text-align: center;">
                                      <p>Ttd</p>
                                      <p class="mt-4"><b><u>Nama Lengkap</u></b></p>
                                      <p>Ketua Pelaksana</p>
                                    </div>
                                    <div class="col-md-6 mt-4" style="text-align: center;">
                                      <p>Ttd</p>
                                      <p class="mt-4"><b><u>Nama Lengkap</u></b></p>
                                      <p>Sekertaris</p>
                                    </div>
                                  </div>
                                  <div style="text-align: center;">
                                    <div style="margin-left: 40px;">
                                      <p>Mengetahui,</p>
                                      <p>Pengurus Koordinator Cabang Korps Pergerakan Mahasiswa Islam Indonesia Putri Jawa Timur</p>
                                    </div>
                                    <p>Ttd</p>
                                    <p class="mt-4"><b><u>Nama Lengkap</u></b></p>
                                    <p>Ketua Pelaksana</p>
                                  </div>
                                </div>
                                <!-- Akhir tata letak persuratan -->
                              </div>

  </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/backend/js/sweetalert2.js')}}"></script>
    <script>
        
      document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('cetakPdfButton').addEventListener('click', function () {
         // Buat objek jsPDF dengan format A4
        const pdf = new jsPDF('p', 'pt', 'a4'); // Ukuran kertas A4

        // Mengukur lebar elemen HTML
        const width = document.getElementById('cardToPrint').offsetWidth;

        // Margin 20px di semua sisi
        const margin = 20;

        // Menghitung tinggi elemen HTML dengan kontennya
        const height = pdf.getTextDimensions(document.getElementById('cardToPrint').textContent, {
          fontSize: 12 // Ukuran font yang sesuai
        }).h;


        // Mengatur ukuran halaman berdasarkan kontennya
        pdf.setProperties({
          title: document.getElementById('judulAsli').textContent
         
        });
        // Menambahkan konten dari elemen HTML ke dokumen PDF sebagai teks
        const content = document.getElementById('cardToPrint').textContent;

        // Membagi konten ke beberapa halaman jika terlalu panjang
        const lines = pdf.splitTextToSize(content, width - (margin * 2));
        let y = margin;
        lines.forEach(line => {
          pdf.text(margin, y, line);
          y += pdf.getTextDimensions(line, { fontSize: 2 }).h + 1; // Sesuaikan spasi antar baris
          if (y >= height) {
            pdf.addPage(); // Tambahkan halaman baru jika kontennya tidak muat dalam halaman saat ini
            y = margin;
          }
        });


        // Simpan PDF dengan nama yang sesuai dengan judul asli
        pdf.save(document.getElementById('judulAsli').textContent + document.getElementById('ToWong').textContent + '-' + '.pdf');
      });
    });
  
    </script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
              $(document).on('click','.swal_delete_button',function(e){
                e.preventDefault();
                  Swal.fire({
                    title: '{{__("Are you sure?")}}',
                    text: '{{__("You would not be able to revert this item!")}}',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                  });
              });
            })


        })(jQuery)
    </script>

    <x-datatable.js/>
@endsection
