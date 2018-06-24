<?php
$qaactivitypendding = class_qaActivityPending();
if(!$row_userstypeinfo['Admin']){
   $qaactivitypendding = class_arrayFilter($qaactivitypendding['response'], 'UsersId', $_SESSION['UserId'], '='); 
}
$qaactivitypendding = class_arrayGroup($qaactivitypendding['response'], 'Description');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Actividades
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <?php if($qaactivitypendding['rows']){ ?>
        <div class="list-group">
            <?php foreach ($qaactivitypendding['response'] as $key_qaactivitypendding => $row_qaactivitypendding) {?>
            <a href="reports_qaactivity.php?Actividad=<?php echo $row_qaactivitypendding['Description']; ?>" class="list-group-item">
                <i class="fa fa-child fa-fw"></i>  <?php echo $row_qaactivitypendding['Description']; ?>
                    <span class="pull-right text-muted small"><em>Total <?php echo $row_qaactivitypendding['Cantidad']; ?></em>
                    </span>
            </a>
            <?php }?>
        </div>
        <!-- /.list-group -->
        <a href="reports_qaactivity.php" class="btn btn-default btn-block">
            <?php echo LANG_VIEWDETAILS ?>
        </a>
        <?php }else{ ?>
        <?php echo LANG_NORESULTS; ?>
        <?php } ?>
    </div>
    <!-- /.panel-body -->
</div>