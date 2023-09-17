
<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('events_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('events_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('events_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('events_page_meta_tags')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/locales/id.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-100">
        <div class="container">
            <div class="title margin-bottom-30"><h1>Kalender Event</h1></div>
            <div class="row">
                <div class="col-lg-12">

<div class="container">
    <div id='calendar'></div>
</div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Tampilan awal
                locale: 'id', // Mengatur bahasa ke Bahasa Indonesia
                events: [
                    <?php $__currentLoopData = $all_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        title: '<?php echo e($data->title); ?>',
                        start: '<?php echo e($data->date); ?>',
                        end: '<?php echo e($data->date_end); ?>',
                        url: '<?php echo e(route("frontend.events.single", $data->slug)); ?>',
                        weton: '<?php echo e(date("l", strtotime($data->date))); ?>' // Menambahkan weton
                    },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                eventRender: function (info) {
                    // Menampilkan weton dalam Bahasa Indonesia
                    var weton = info.event.extendedProps.weton;
                    if (weton) {
                        info.el.querySelector('.fc-title').innerHTML += '<br>' + weton;
                    }
                },
                eventClick: function (info) {
                    if (info.event.url) {
                        window.open(info.event.url); // Buka URL detail acara dalam jendela baru
                    }
                },
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                }
            });

            calendar.render();
        });
    </script>
    
    <style>
        #calendar {
            max-width: 1100px;
            margin: 40px auto;
        }
    </style>




             
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/frontend/events/event-calendar.blade.php ENDPATH**/ ?>