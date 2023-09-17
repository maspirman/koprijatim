<!-- Start datatable js -->
<script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/responsive.bootstrap.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.0/html2pdf.bundle.min.js"></script>

<?php if(!isset($only_js)): ?>
<script>
    (function($){
    "use strict";
    $('.table-wrap > table').DataTable( {
        "order": [[ 1, "desc" ]],
        'columnDefs' : [{
            'targets' : 'no-sort',
            'orderable' : false
        }]
    } );
            
    })(jQuery);
</script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\koprijatim.or.id\@core\resources\views/backend/partials/datatable/script-enqueue.blade.php ENDPATH**/ ?>