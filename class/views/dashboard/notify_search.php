<?php
//users list
$userslist   = class_usersList(null);
$array_users = array();
if ($userslist['rows']) {
    foreach ($userslist['response'] as $row_userslist) {
        $array_users[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['UserName'], 'selected' => $_GET['Agente']);
    }
}

?>
<form action="reports_qacustomers.php" method="GET" accept-charset="utf-8">
<div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-search fa-fw"></i> Buscar
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">
                <p>
                <?php echo class_formInput('Todos los Agentes', 'select', 'Agente', null, $array_users, null); ?>
                </p>
                <p>
                <input class="form-control" type="text" name="search" placeholder="Nombre de Cliente">
        </p>
        </div>

<?php
// define buttons for form
$formButtons = array(
    LANG_SHOWRESULTS => array('buttonType' => 'submit', 'disabled' => null, 'class' => 'form-control', 'name' => 'action', 'value' => 'Mostrar', 'action' => null)
);

echo class_formButtons($formButtons)
?>
        </div>
        <!-- /.panel-body -->
    </div>

    </form>