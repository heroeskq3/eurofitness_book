<?php
//customers
$qacustomerslist = class_qaCustomersList();
if(!$row_userstypeinfo['Admin']){
   $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $_SESSION['UserId'], '='); 
}

$context = array();
foreach ($qacustomerslist['response'] as $key_qacustomerslist => $row_qacustomerslist) {

    //classes info
    if ($row_qacustomerslist['ClassesId']) {
        $qaclassesinfo     = class_qaClassesInfo($row_qacustomerslist['ClassesId']);
        $row_qaclassesinfo = $qaclassesinfo['response'][0];
    } else {
        $row_qaclassesinfo['Name'] = 'Undefined';
    }

    if ($row_qacustomerslist['LastVisit']) {
        $date = $row_qacustomerslist['LastVisit'];
    } else {
        $date = $row_qacustomerslist['CreateDate'];
    }

    //context
    $context_01 = class_qacustomerscontext($date, $row_qaclassesinfo['Period'], 365);
    $context[]  = $context_01['response'];

}

//customers context
$qasuccess = class_arrayFilter($context, 'context', 'success', '=');
$qawarning = class_arrayFilter($context, 'context', 'warning', '=');
$qadanger  = class_arrayFilter($context, 'context', 'danger', '=');
$qaprimary = class_arrayFilter($context, 'context', 'primary', '=');
?>
    <div class="col-lg-3 col-md-6">
<a href="reports_qacustomers.php?&Estado=<?php echo CONTEXT_PRIMARY; ?>">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-star fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $qaprimary['rows']; ?>
                        </div>
                        <div>Visitas para semana!</div>
                    </div>
                </div>
            </div>

                <div class="panel-footer">
                    <span class="pull-left"><?php echo LANG_VIEWDETAILS ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>

        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="reports_qacustomers.php?&Estado=<?php echo CONTEXT_SUCCESS; ?>">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-smile-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $qasuccess['rows'] ?>
                        </div>
                        <div>Seguimiento al día!</div>
                    </div>
                </div>
            </div>

                <div class="panel-footer">
                    <span class="pull-left"><?php echo LANG_VIEWDETAILS ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>

        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="reports_qacustomers.php?&Estado=<?php echo CONTEXT_WARNING; ?>">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-meh-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $qawarning['rows'] ?>
                        </div>
                        <div>Falta de Atención!</div>
                    </div>
                </div>
            </div>

                <div class="panel-footer">
                    <span class="pull-left"><?php echo LANG_VIEWDETAILS ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>

        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6">
        <a href="reports_qacustomers.php?&Estado=<?php echo CONTEXT_DANGER; ?>">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-frown-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            <?php echo $qadanger['rows'] ?>
                        </div>
                        <div>Caducado!</div>
                    </div>
                </div>
            </div>

                <div class="panel-footer">
                    <span class="pull-left"><?php echo LANG_VIEWDETAILS ?></span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>

        </div>
        </a>
    </div>