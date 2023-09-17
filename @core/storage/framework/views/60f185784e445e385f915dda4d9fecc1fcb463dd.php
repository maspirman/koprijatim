<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Featured Cause Area')); ?>

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
                        <h4 class="header-title"><?php echo e(__('Featured Cause Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.featured.cause.area')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="home_page_01_featured_cause_area_subtitle"><?php echo e(__('Subtitle')); ?></label>
                                <input type="text" name="home_page_01_featured_cause_area_subtitle" value="<?php echo e(get_static_option('home_page_01_featured_cause_area_subtitle')); ?>" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_featured_cause_area_title"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="home_page_01_featured_cause_area_title" value="<?php echo e(get_static_option('home_page_01_featured_cause_area_title')); ?>" class="form-control" >
                                <div class="info-text"><?php echo e(__('user {color} color text {/color} to make text colorful')); ?></div>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_featured_cause_area_button_text"><?php echo e(__('Button Text')); ?></label>
                                <input type="text" name="home_page_01_featured_cause_area_button_text" value="<?php echo e(get_static_option('home_page_01_featured_cause_area_button_text')); ?>" class="form-control" >
                            </div>

                            <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/pages/home/home-01/featured-cause-area.blade.php ENDPATH**/ ?>