<?php
$qaappointmentsstatus = class_qaAppointmentsList();
if(!$row_userstypeinfo['Admin']){
   $qaappointmentsstatus = class_arrayFilter($qaappointmentsstatus['response'], 'UsersId', $_SESSION['UserId'], '='); 
}
$qaappointmentsstatus = class_arrayFilter($qaappointmentsstatus['response'], 'Status', 2, '=');
$qaappointmentsstatus = class_qaAppointmentsStatus($qaappointmentsstatus['response']);

//$qaappointmentsstatus = class_arrayGroup($qaappointmentsstatus['response'], 'Status');
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-calendar fa-fw"></i> Próximas Visitas
        </div>
        
        <div class="panel-body">
        <?php if($qaappointmentsstatus['rows']){ ?>
            <div class="list-group">
                <?php foreach ($qaappointmentsstatus['response'] as $key_qaappointmentsstatus => $row_qaappointmentsstatus) {?>
                <?php
                $qacustomersinfo = class_qaCustomersInfo($row_qaappointmentsstatus['CustomersId']);
                $row_qacustomersinfo = $qacustomersinfo['response'][0];

                //define status
                if($row_qaappointmentsstatus['DateSet'] == $DateSet){
                    $status = 'Hoy';
                }elseif($row_qaappointmentsstatus['DateSet'] < $DateSet){
                    $status = 'Vencida';
                }else{
                    $status = $row_qaappointmentsstatus['DateSet'];
                }
                ?>
                <a href="qa_finished.php?Id=<?php echo $row_qaappointmentsstatus['Id']; ?>" class="list-group-item">
                <i class="fa fa-child fa-fw"></i> <?php echo $row_qacustomersinfo['FullName']; ?>
                    <span class="pull-right text-muted small"><em><?php echo $status; ?></em>
                    </span>
            </a>
                <?php }?>
            </div>
            <!-- /.list-group -->
            <a href="reports_qaappointments.php" class="btn btn-default btn-block">
                <?php echo LANG_VIEWDETAILS ?>
            </a>
            <?php }else{ ?>
            <?php echo LANG_NORESULTS; ?>
            <?php } ?>
        </div>
        



    </div>