<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('About Us Area')); ?>

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('backend/partials/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('About Us Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.about.us')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div>

                                    <div class="form-group">
                                        <label for="home_page_01_about_us_subtitle"><?php echo e(__('Subtitle')); ?></label>
                                        <input type="text" name="home_page_01_about_us_subtitle" class="form-control" value="<?php echo e(get_static_option('home_page_01_about_us_subtitle')); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="home_page_01_about_us_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_about_us_title')); ?>">
                                        <div class="info-text"><?php echo e(__('user {color} color text {/color} to make text colorful')); ?></div>
                                    </div>
                                    <?php if(in_array(get_static_option('home_page_variant'), ['02','03'])): ?>
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_donation_text"><?php echo e(__('Donation Text')); ?></label>
                                        <input type="text" name="home_page_01_about_us_donation_text" class="form-control" value="<?php echo e(get_static_option('home_page_01_about_us_donation_text')); ?>">
                                    </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <label for="home_page_01_about_us_description"><?php echo e(__('Description')); ?></label>
                                        <input type="hidden" name="home_page_01_about_us_description" value='<?php echo e(get_static_option('home_page_01_about_us_description')); ?>'/>
                                        <div class="summernote" data-content='<?php echo e(get_static_option('home_page_01_about_us_description')); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_about_us_lists"><?php echo e(__('Lists')); ?></label>
                                        <textarea name="home_page_01_about_us_lists" class="form-control" cols="30" rows="5"><?php echo e(get_static_option('home_page_01_about_us_lists')); ?></textarea>
                                        <span class="info-text"><?php echo e(__('separate item by new line')); ?></span>
                                    </div>

                                    <?php if(get_static_option('home_page_variant') === '02'): ?>
                                        <div class="form-group">
                                            <label for="home_page_02_about_us_donation_text"><?php echo e(__('Donation Text')); ?></label>
                                            <input type="text" name="home_page_02_about_us_donation_text" class="form-control" value="<?php echo e(get_static_option('home_page_02_about_us_donation_text')); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_02_about_us_short_description"><?php echo e(__('Short Description')); ?></label>
                                            <input type="hidden" name="home_page_02_about_us_short_description" value='<?php echo e(get_static_option('home_page_02_about_us_short_description')); ?>'/>
                                            <div class="summernote" data-content='<?php echo e(get_static_option('home_page_02_about_us_short_description')); ?>'></div>
                                        </div>
                                    <?php endif; ?>

                            <div class="form-group">
                                <label for="home_page_01_about_us_total_donation"><?php echo e(__('Total Donation')); ?></label>
                                <input type="text" name="home_page_01_about_us_total_donation" class="form-control" value="<?php echo e(get_static_option('home_page_01_about_us_total_donation')); ?>">
                            </div>
                            <?php if(get_static_option('home_page_variant') === '01'): ?>
                            <div class="form-group">
                                <label><?php echo e(__('Right Image')); ?></label>
                                <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php $home_page_01_about_us_right_image = get_static_option('home_page_01_about_us_right_image'); ?>
                                        <?php echo render_attachment_preview_for_admin($home_page_01_about_us_right_image); ?>

                                    </div>
                                    <input type="hidden" name="home_page_01_about_us_right_image" value="<?php echo e($home_page_01_about_us_right_image); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($home_page_01_about_us_right_image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($background_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 550x410 pixel')); ?></small>
                            </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') === '02'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Left Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php $home_page_01_about_us_right_image = get_static_option('home_page_02_about_us_left_image'); ?>
                                            <?php echo render_attachment_preview_for_admin($home_page_01_about_us_right_image); ?>

                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_left_image" value="<?php echo e($home_page_01_about_us_right_image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($home_page_01_about_us_right_image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 350x450 pixel')); ?></small>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Right Bottom Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php $home_page_01_about_us_right_image = get_static_option('home_page_02_about_us_right_bottom_image'); ?>
                                            <?php echo render_attachment_preview_for_admin($home_page_01_about_us_right_image); ?>

                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_right_bottom_image" value="<?php echo e($home_page_01_about_us_right_image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($home_page_01_about_us_right_image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 350x450 pixel')); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="home_page_02_about_us_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                                    <div class="btn-group ">
                                        <button type="button" class="btn btn-primary iconpicker-component">
                                            <i class="<?php echo e(get_static_option('home_page_02_about_us_icon')); ?>"></i>
                                        </button>
                                        <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                data-selected="<?php echo e(get_static_option('home_page_02_about_us_icon')); ?>" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu"></div>
                                    </div>
                                    <input type="hidden" class="form-control" value="<?php echo e(get_static_option('home_page_02_about_us_icon')); ?>" name="home_page_02_about_us_icon">
                                </div>
                            <?php endif; ?>

                            <?php if(get_static_option('home_page_variant') === '03'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Right Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php $home_page_01_about_us_right_image = get_static_option('home_page_03_about_us_right_image'); ?>
                                            <?php echo render_attachment_preview_for_admin($home_page_01_about_us_right_image); ?>

                                        </div>
                                        <input type="hidden" name="home_page_03_about_us_right_image" value="<?php echo e($home_page_01_about_us_right_image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($home_page_01_about_us_right_image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 950x680 pixel')); ?></small>
                                </div>
                            <?php endif; ?>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>

        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <script>
        (function($){
            "use strict";
            $(document).ready(function () {
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

                $('.summernote').summernote({
                    height: 200,   //set editable area's height
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

                $('.icp-dd').iconpicker();
                $('.icp-dd').on('iconpickerSelected', function (e) {
                    var selectedIcon = e.iconpickerValue;
                    $(this).parent().parent().children('input').val(selectedIcon);
                });

            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/pages/home/home-01/about-us.blade.php ENDPATH**/ ?>