<?php 
//define vars
if (!$row_userstypeinfo['Admin']) {

    if(isset($_GET['Agente'])){
        $_GET['Agente'] = $_GET['Agente'];
    }else{
        $_GET['Agente'] = $row_usersinfo['UserName'];
    }
}
?>
<div class="row">
<?php require_once '../class/views/dashboard/qa_customers.php';?>
</div>
<div class="row">
    <div class="col-lg-4">
        <?php require_once '../class/views/dashboard/notify_search.php';?>
    </div>
        <div class="col-lg-4">
        <?php require_once '../class/views/dashboard/notify_qaappointments.php';?>
    </div>
    <div class="col-lg-4">
        <?php require_once '../class/views/dashboard/notify_qaactivity.php';?>
    </div>
</div>
<script src="<?php echo PATH_VENDOR; ?>raphael/raphael.min.js"></script>
<script src="<?php echo PATH_VENDOR; ?>morrisjs/morris.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>data/morris-data.js"></script>
