<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('What We Do Area')); ?>

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
                        <h4 class="header-title"><?php echo e(__('What We Do Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.what.we.do.area')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="home_page_02_what_we_do_area_subtitle"><?php echo e(__('Subtitle')); ?></label>
                                <input type="text" name="home_page_02_what_we_do_area_subtitle" class="form-control" value="<?php echo e(get_static_option('home_page_02_what_we_do_area_subtitle')); ?>" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_02_what_we_do_area_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="home_page_02_what_we_do_area_title" class="form-control" value="<?php echo e(get_static_option('home_page_02_what_we_do_area_title')); ?>" >
                                <div class="info-text"><?php echo e(__('user {color} color text {/color} to make text colorful')); ?></div>
                            </div>

                            <?php if(get_static_option('home_page_variant') == '02'): ?>
                            <div class="form-group">
                                <label><?php echo e(__('Left Background Image')); ?></label>
                                <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php $home_page_01_about_us_right_image = get_static_option('home_page_02_what_we_do_left_image'); ?>
                                        <?php echo render_attachment_preview_for_admin($home_page_01_about_us_right_image); ?>

                                    </div>
                                    <input type="hidden" name="home_page_02_what_we_do_left_image" value="<?php echo e($home_page_01_about_us_right_image); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($home_page_01_about_us_right_image); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($background_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 1050x1050 pixel')); ?></small>
                            </div>
                            <?php endif; ?>
                            <?php
                                $all_icon_fields =  get_static_option('homepage_02_what_we_do_section_icon');
                                $all_icon_fields = !empty($all_icon_fields) ? unserialize($all_icon_fields) : ['flaticon-transfusion'];
                            ?>
                            <?php $__currentLoopData = $all_icon_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $icon_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="iconbox-repeater-wrapper">
                                    <div class="all-field-wrap">

                                        <div class="tab-content margin-top-30" id="myTabContent">

                                                <?php
                                                    $all_title_fields = get_static_option('homepage_02_what_we_do_section_title');
                                                    $all_title_fields = !empty($all_title_fields) ? unserialize($all_title_fields) : ['Education'];
                                                    $all_description_fields = get_static_option('homepage_02_what_we_do_section_description');
                                                    $all_description_fields = !empty($all_description_fields) ? unserialize($all_description_fields) : ['We are a non-profit organisation in USA that works towards supporting underprivileged children.'];
                                                    $all_url_fields =  get_static_option('homepage_02_what_we_do_section_url');
                                                    $all_url_fields = !empty($all_url_fields) ? unserialize($all_url_fields) : ['#'];
                                                ?>


                                                <div class="form-group">
                                                    <label for="homepage_02_what_we_do_section_title"><?php echo e(__('Title')); ?></label>
                                                    <input type="text" name="homepage_02_what_we_do_section_title[]" class="form-control" value="<?php echo e($all_title_fields[$index] ?? ''); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="homepage_02_what_we_do_section_description"><?php echo e(__('Description')); ?></label>
                                                    <textarea name="homepage_02_what_we_do_section_description[]" class="form-control"><?php echo e($all_description_fields[$index] ?? ''); ?></textarea>
                                                </div>

                                            <div class="form-group">
                                                <label for="homepage_02_what_we_do_section_url"><?php echo e(__('Description')); ?></label>
                                                <input type="text" name="homepage_02_what_we_do_section_url[]" class="form-control" value="<?php echo e($all_url_fields[$index] ?? ''); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="homepage_02_what_we_do_section_icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                                                <div class="btn-group ">
                                                    <button type="button" class="btn btn-primary iconpicker-component">
                                                        <i class="<?php echo e($icon_field); ?>"></i>
                                                    </button>
                                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                                            data-selected="<?php echo e($icon_field); ?>" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu"></div>
                                                </div>
                                                <input type="hidden" class="form-control" value="<?php echo e($icon_field); ?>" name="homepage_02_what_we_do_section_icon[]">
                                            </div>
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.icon-picker-activate-js','data' => []]); ?>
<?php $component->withName('icon-picker-activate-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/pages/home/home-01/what-we-do-area.blade.php ENDPATH**/ ?>