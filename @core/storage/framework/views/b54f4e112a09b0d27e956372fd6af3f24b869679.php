
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('New Letters')); ?>

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
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="headerbtn-wrap">
                          <div class="row">
                              <div class="col-md-12">
                                  <h4 class="header-title"><?php echo e(__('Add New Letters')); ?>

                                      <a href="<?php echo e(route('admin.events.all')); ?>" class="btn btn-info pull-right mb-4"><?php echo e(__('All Letters')); ?></a>
                                  </h4>
                              </div>
                          </div>

                        </div>
                        <form action="<?php echo e(route('admin.letter.new')); ?>" method="post" enctype="multipart/form-data">
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
                                                <label for="organizer_phone"><?php echo e(__('Nama Event')); ?></label>
                                                <input type="text" class="form-control"  id="event_name" name="event_name" value="<?php echo e(old('event_name')); ?>" placeholder="<?php echo e(__('nama event')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category"><?php echo e(__('Kategori Event')); ?></label>
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
                                                <label for="category"><?php echo e(__('Jenis Surat')); ?></label>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer"><?php echo e(__('No Surat')); ?></label>
                                                <input type="text" class="form-control"  id="letter_no" name="letter_no" value="<?php echo e(old('letter_no')); ?>" placeholder="<?php echo e(__('Nomor Surat')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer_email"><?php echo e(__('Kepada')); ?></label>
                                                <input type="text" class="form-control"  id="target" name="letter_target" value="<?php echo e(old('letter_target')); ?>" placeholder="<?php echo e(__('Kepada Yth')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="organizer_phone"><?php echo e(__('Materi')); ?></label>
                                                <input type="text" class="form-control"  id="letter_materi" name="letter_materi" value="<?php echo e(old('letter_materi')); ?>" placeholder="<?php echo e(__('materi')); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo e(__('Pembuka')); ?></label>
                                        <input type="hidden" name="letter_opening" value="" >
                                        <div class="summernote" id="opener-summernote" data-content=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Isi Surat')); ?></label>
                                        <input type="hidden" name="letter_content" value="" >
                                        <div class="summernote" id="content-summernote" data-content=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(__('Penutup')); ?></label>
                                        <input type="hidden" name="letter_closing" value="" >
                                        <div class="summernote" id="closing-summernote" data-content=""></div>
                                    </div>
                                    <div id="all-temp-data" data-json="<?php echo e($dataToSend); ?>"></div>
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

                                    <div class="form-group">
                                        <label><?php echo e(__('Deskripsi Event')); ?></label>
                                        <input type="hidden" name="event_content" >
                                        <div class="summernote"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="time"><?php echo e(__('Time')); ?></label>
                                                <input type="text" class="form-control"  id="time" name="time" placeholder="<?php echo e(__('time')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="date"><?php echo e(__('Tanggal Mulai')); ?></label>
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
                                                <label for="cost"><?php echo e(__('Biaya')); ?><small class="info-text"><?php echo e(__(' (Masukkan angka 0 jika gratis)')); ?></small></label>
                                                <input type="number" class="form-control"  id="cost" name="cost" placeholder="<?php echo e(__('cost')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="available_tickets"><?php echo e(__('Jumlah Kursi')); ?></label>
                                                <input type="number" class="form-control"  id="available_tickets" name="available_tickets" placeholder="<?php echo e(__('available tickets')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="organizer"><?php echo e(__('Organizer/Penyelenggara')); ?></label>
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
                                                <label for="venue"><?php echo e(__('Tempat')); ?></label>
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

                                    <div class="form-group"><label>Lampiran</label></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image"><?php echo e(__('Image')); ?> <small><?php echo e(__('Recommended image size 1920x1280')); ?></small></label>
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
                                        <label for="status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option value="draft"><?php echo e(__('Draft')); ?></option>
                                        </select>
                                    </div>
                                    <button id="submit" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Add New Event')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script>

    $(document).ready(function () {
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy" // Format tanggal "dd-mm-yyyy"
        });
    });

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
                    var url = `<?php echo e(url('/events/')); ?>/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').hide();
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
                            $('#category').html('<option value="">Select Category</option>');
                            $.each(data,function(index,value){
                                $('#category').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });
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
        })(jQuery)
    </script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/letter/new-letter.blade.php ENDPATH**/ ?>