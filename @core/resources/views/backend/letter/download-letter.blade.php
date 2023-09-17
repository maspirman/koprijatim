@extends('backend.admin-master')
@section('site-title')
    {{__('Preview Letter')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @include('backend/partials/error')
            </div>
            <div class="col-lg-10 col-md-8 mt-5 ml-5">
                <div class="card">
                    <div class="card-body">
                        <div class="headerbtn-wrap">
                          <div class="row">
                              <div class="col-md-12">
                                  <h4 class="header-title">
                                      <button id="cetakPdfButton" class="btn btn-secondary pull-right mb-3 ml-2">{{__('Export df')}}</button>
                                      <a href="{{route('admin.letter.all')}}" class="btn btn-info pull-right mb-3">{{__('Kembali')}}</a>
                                  </h4>
                              </div>
                          </div>
                            <!-- Contoh elemen untuk dikonversi menjadi PDF -->
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
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.partials.media-upload.media-upload-markup')
@endsection

@section('script')
    <script src="{{asset('assets/backend/js/summernote-bs4.js')}}"></script>
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
</head>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {

                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                var sl =  $('.blog_slug').val();
                var url = `{{url('/events/')}}/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');
                var form = $('#blog_new_form');

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').show();
                    $(this).hide();
                    $('.slug_update_button').show();
                });

                //Slug Update Code
                $(document).on('click', '.slug_update_button', function (e) {
                    e.preventDefault();
                    $(this).hide();
                    $('.slug_edit_button').show();
                    var update_input = $('.blog_slug').val();
                    var slug = converToSlug(update_input);
                    var url = `{{url('/events/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });


                <x-btn.update/>
                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $.ajax({
                        url: "{{route('admin.events.category.by.lang')}}",
                        type: "POST",
                        data: {
                            _token : "{{csrf_token()}}",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $('#category').html('<option value="">{{__('Select Category')}}</option>');
                            $.each(data,function(index,value){
                                $('#category').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });

                $('.summernote').summernote({
                    height: 500,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
                if($('.summernote').length > 0){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }
            });
        })(jQuery)
    </script>

    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
