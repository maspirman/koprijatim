
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('New Letter')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
       <div class="headerbtn-wrap d-flex justify-content-between margin-bottom-50">
           <h3 class="header-title"><?php echo e(__('Create New Letter')); ?></h3>
           <a href="<?php echo e(route('user.letter.all')); ?>" class="btn btn-info"><?php echo e(__('All letter List')); ?></a>
       </div>
        <form action="<?php echo e(route('user.letter.new')); ?>" method="post" enctype="multipart/form-data">
            
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="<?php echo e(__('Title')); ?>">
                                    </div>



                                    <div class="form-group permalink_label">
                                        <label class="text-dark"><?php echo e(__('Permalink / Slug * : ')); ?>

                                            <span id="slug_show" class="display-inline"></span>
                                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm ml-1 px-2 py-1 slug_edit_button"> <i class="fas fa-edit"></i> </button>
                                        <input type="text" name="slug" class="form-control blog_slug mt-2" style="display: none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 px-2 py-1" style="display: none"><?php echo e(__('Update')); ?></button>
                                    </span>
                                        </label>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone"><?php echo e(__('Nama Event *')); ?></label>
                                                <input type="text" class="form-control"  id="event_name" name="event_name" value="<?php echo e(old('event_name')); ?>" placeholder="<?php echo e(__('Nama Acara')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category"><?php echo e(__('Kategori Event *')); ?></label>
                                                 <select name="category_event_id" class="form-control" id="category_event">
                                            <option value=""><?php echo e(__("Pilih Kategori ")); ?></option>
                                            <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                                
                                            </div>
                                
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="category"><?php echo e(__('Jenis Surat *')); ?></label>
                                                <select name="category_letter_id" class="form-control" id="category_letter">
                                                    <option value=""><?php echo e(__("Pilih Jenis")); ?></option>
                                                    <?php $__currentLoopData = $all_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $templates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($templates->id); ?>"><?php echo e($templates->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $dataToSend = json_encode($all_temp); ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="organizer"><?php echo e(__('No Surat')); ?></label>
                                                <input type="text" class="form-control"  id="letter_no" name="letter_no" value="<?php echo e(old('letter_no')); ?>" placeholder="<?php echo e(__('Nomor Surat')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="organizer_email"><?php echo e(__('Kepada *')); ?></label>
                                                <input type="text" class="form-control"  id="target" name="letter_target" value="<?php echo e(old('letter_target')); ?>" placeholder="<?php echo e(__('Kepada Yth')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="organizer_phone"><?php echo e(__('Judul Materi *')); ?></label>
                                                <input type="text" class="form-control"  id="letter_materi" name="lesson_materi" value="<?php echo e(old('lesson_materi')); ?>" placeholder="<?php echo e(__('Judul Materi')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Pembuka *')); ?></label>
                                                <input type="hidden" name="letter_opening" value="" >
                                                <div class="summernote" id="opener-summernote" data-content=""></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Isi Surat *')); ?></label>
                                                <input type="hidden" name="letter_content" value="" >
                                                <div class="summernote" id="content-summernote" data-content=""></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                              <div class="form-group">
                                                <label><?php echo e(__('Penutup *')); ?></label>
                                                <input type="hidden" name="letter_closing" value="" >
                                                <div class="summernote" id="closing-summernote" data-content=""></div>
                                            </div>
                                        </div>
                                        <div id="all-temp-data" data-json="<?php echo e($dataToSend); ?>"></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo e(__('Deskripsi Event *')); ?></label>
                                                <input type="hidden" name="event_content" >
                                                <div class="summernote"></div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <script>
                                        $(document).ready(function () {
                                            $('#category_letter').change(function () {
                                                var selectedCategoryId = $(this).val(); // Mendapatkan ID kategori yang dipilih
                                                var allTempData = $('#all-temp-data').data('json'); // Mendapatkan data JSON
                                                
                                                // Cari data yang sesuai berdasarkan ID yang dipilih
                                                var selectedCategoryData = allTempData.find(function(item) {
                                                    return item.id == selectedCategoryId;
                                                });
                                                
                                                if (selectedCategoryData) {
                                                    // Set nilai data-content di dalam elemen summernote sesuai dengan data yang dipilih
                                                    $('#opener-summernote').summernote('code', selectedCategoryData.opener);
                                                    $('#content-summernote').summernote('code', selectedCategoryData.value);
                                                    $('#closing-summernote').summernote('code', selectedCategoryData.closing);
                                                }
                                            });
                                        });


                                    </script>

                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="time"><?php echo e(__('Time *')); ?></label>
                                                <input type="text" class="form-control"  id="time" name="time" placeholder="<?php echo e(__('time')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date"><?php echo e(__('Tanggal Mulai *')); ?></label>
                                                <input type="date" date-format="dd-mm-yyy" class="form-control datepicker"  id="date" name="date" placeholder="<?php echo e(__('Date')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date"><?php echo e(__('Tanggal Selesai')); ?></label>
                                                <input type="date" class="form-control datepicker"  id="date_end" name="date_end" placeholder="<?php echo e(__('Date')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cost"><?php echo e(__('Biaya *')); ?><small class="info-text"><?php echo e(__(' (Masukkan angka 0 jika gratis)')); ?></small></label>
                                                <input type="number" class="form-control"  id="cost" name="cost" placeholder="<?php echo e(__('cost')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="available_tickets"><?php echo e(__('Jumlah Kursi *')); ?></label>
                                                <input type="number" class="form-control"  id="available_tickets" name="available_tickets" placeholder="<?php echo e(__('available tickets')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer"><?php echo e(__('Organizer/Penyelenggara *')); ?></label>
                                                <input type="text" class="form-control"  id="organizer" name="organizer" value="<?php echo e(old('organizer')); ?>" placeholder="<?php echo e(__('Event Organizer')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer_email"><?php echo e(__('Organizer Email')); ?></label>
                                                <input type="text" class="form-control"  id="organizer_email" name="organizer_email" value="<?php echo e(old('organizer_email')); ?>" placeholder="<?php echo e(__('Organizer Email')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone"><?php echo e(__('Organizer Phone')); ?></label>
                                                <input type="text" class="form-control"  id="organizer_phone" name="organizer_phone" value="<?php echo e(old('organizer_phone')); ?>" placeholder="<?php echo e(__('Organizer Phone')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="venue"><?php echo e(__('Tempat *')); ?></label>
                                                <input type="text" class="form-control"  id="venue" name="venue" value="<?php echo e(old('venue')); ?>" placeholder="<?php echo e(__('Tempat Event')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="venue_location"><?php echo e(__('Maps Location')); ?></label>
                                                <input type="text" class="form-control"  id="venue_location" name="venue_location" value="<?php echo e(old('venue_location')); ?>" placeholder="<?php echo e(__('Maps Location')); ?>">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group"><label>Lampiran *</label></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image"><?php echo e(__('Image Pamflet/Poster *')); ?> <small><?php echo e(__('Recommended image size 1920x1280')); ?></small></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input type="hidden" name="image">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Event Image')); ?>" data-modaltitle="<?php echo e(__('Upload Event Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                        <?php echo e(__('Upload Image')); ?>

                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="image"><?php echo e(__('Lampiran ToR')); ?> <small><?php echo e(__('Pdf File Only')); ?></small></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                                <input type="text" name="meta_title"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="meta_tags"><?php echo e(__('Meta Tags')); ?><small> (pisahkan dengan koma (,))</small></label>
                                                <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" id="meta_tags">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="hidden" name="status" value="pending">
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Kirim Permohonan')); ?></button>
                                </div>
                            </div>
                        
        </form>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => ['userUpload' => true,'imageUploadRoute' => route('user.upload.media.file')]]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['userUpload' => true,'imageUploadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file'))]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/backend/js/select2.min.js')); ?>"></script>

    <script>
        (function($){
            "use strict";
            $(document).ready(function () {

                $('.gifts').select2();
                $('.gifts').prop('disabled',true);
                $(document).on('change','.add_gift_status',function(){

                    if(this.checked){
                        $('.gifts').prop('disabled',false);
                        $('.gift_select_wrapper').removeClass('d-none')
                    }else{
                        $('.gift_select_wrapper').addClass('d-none')
                    }
                });


                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                $('.permalink_label').hide();
                $(document).on('keyup', '#title', function (e) {
                    var slug = converToSlug($(this).val());
                    var url = `<?php echo e(url('/events/')); ?>/` + slug;
                    $('.permalink_label').show();
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);
                });

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
                    var url = `<?php echo e(url('/donation/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
                });
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
           
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.submit','data' => []]); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                $('.summernote').summernote({
                    height: 400,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
            });
        })(jQuery);
    </script>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => ['deleteRoute' => route('user.upload.media.file.delete'),'imgAltChangeRoute' => route('user.upload.media.file.alt.change'),'allImageLoadRoute' => route('user.upload.media.file.all')]]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['deleteRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.delete')),'imgAltChangeRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.alt.change')),'allImageLoadRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('user.upload.media.file.all'))]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.repeater','data' => []]); ?>
<?php $component->withName('repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

  <script>
      $(function (){
          let data;
          data = $('.data').children();
          data[data.length-1].remove();
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/frontend/user/dashboard/letter/new-letter.blade.php ENDPATH**/ ?>