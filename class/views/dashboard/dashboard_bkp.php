<div class="row">
<?php require_once '../class/views/dashboard/qa_customers.php';?>
</div>
<div class="row">
    <div class="col-lg-8">
        <?php require_once '../class/views/dashboard/qa_areachart.php';?>
        <?php require_once '../class/views/dashboard/qa_barchart.php';?>
        <?php require_once '../class/views/dashboard/qa_timeline.php';?>
    </div>
    <div class="col-lg-4">
        <?php require_once '../class/views/dashboard/qa_notifications.php';?>
        <?php require_once '../class/views/dashboard/qa_donutchart.php';?>
        <?php require_once '../class/views/dashboard/qa_chat.php';?>
    </div>
</div>
<script src="<?php echo PATH_VENDOR; ?>raphael/raphael.min.js"></script>
<script src="<?php echo PATH_VENDOR; ?>morrisjs/morris.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>data/morris-data.js"></script>
