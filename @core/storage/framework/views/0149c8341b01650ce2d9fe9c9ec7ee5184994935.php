<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Testimonial Area')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
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
                        <h4 class="header-title"><?php echo e(__('Testimonial Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.testimonial')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">
                                <label for="home_page_01_testimonial_section_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="home_page_01_testimonial_section_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_testimonial_section_title')); ?>" >
                                <div class="info-text"><?php echo e(__('user {color} color text {/color} to make text colorful')); ?></div>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_testimonial_section_subtitle"><?php echo e(__('Subtitle')); ?></label>
                                <input type="text" name="home_page_01_testimonial_section_subtitle" class="form-control" value="<?php echo e(get_static_option('home_page_01_testimonial_section_subtitle')); ?>" >
                            </div>

                            <div class="form-group">
                                <label for="home_01_testimonial_bg"><?php echo e(__('Background Image')); ?></label>
                                <?php $home_03_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $home_03_img = get_attachment_image_by_id(get_static_option('home_01_testimonial_bg'),null,false);
                                        ?>
                                        <?php if(!empty($home_03_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($home_03_img['img_url']); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $home_03_image_upload_btn_label = 'Change Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="home_01_testimonial_bg" value="<?php echo e(get_static_option('home_01_testimonial_bg')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_01_testimonial_bg')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($home_03_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                            </div>
                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/pages/home/home-01/testimonial.blade.php ENDPATH**/ ?>