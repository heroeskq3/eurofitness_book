<?php 
$qaactivitypendding = class_qaActivityPending();
$qaactivitypendding = class_arrayGroup($qaactivitypendding['response'], 'Description');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bell fa-fw"></i> Actividades
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="list-group">
<?php foreach ($qaactivitypendding['response'] as $key_qaactivitypendding => $row_qaactivitypendding) { ?>
            <a href="reports_qaactivity.php?Actividad=<?php echo $row_qaactivitypendding['Description']; ?>" class="list-group-item">
                <i class="fa fa-child fa-fw"></i> <?php echo $row_qaactivitypendding['Cantidad']; ?> <?php echo $row_qaactivitypendding['Description']; ?>
                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                    </span>
            </a>
<?php } ?>
        </div>
        <!-- /.list-group -->
        <a href="reports_qaactivity.php" class="btn btn-default btn-block">
            <?php echo LANG_VIEWDETAILS ?>
        </a>
    </div>
    <!-- /.panel-body -->
</div>