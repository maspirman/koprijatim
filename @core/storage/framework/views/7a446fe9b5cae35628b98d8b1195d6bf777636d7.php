
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Preview Letter')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-10 col-md-8 mt-5 ml-5">
                <div class="card">
                    <div class="card-body">
                        <div class="headerbtn-wrap">
                          <div class="row">
                              <div class="col-md-12">
                                  <h4 class="header-title">
                                      <button id="cetakPdfButton" class="btn btn-secondary pull-right mb-3 ml-2"><?php echo e(__('Export df')); ?></button>
                                      <a href="<?php echo e(route('admin.letter.all')); ?>" class="btn btn-info pull-right mb-3"><?php echo e(__('Kembali')); ?></a>
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
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
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
                var url = `<?php echo e(url('/events/')); ?>/` + sl;
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
                    var url = `<?php echo e(url('/events/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });


                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $.ajax({
                        url: "<?php echo e(route('admin.events.category.by.lang')); ?>",
                        type: "POST",
                        data: {
                            _token : "<?php echo e(csrf_token()); ?>",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $('#category').html('<option value=""><?php echo e(__('Select Category')); ?></option>');
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

    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/letter/download-letter.blade.php ENDPATH**/ ?>