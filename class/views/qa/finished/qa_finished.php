<?php
if ($form_add) {
    $qatransfersupdate = class_qaFinishedUpdate($Id, $Details, $Status);

    //set activity
    if ($qatransfersupdate['rows']) {
        
        //user info
        $usersinfo2     = class_usersInfo($UsersId);
        $row_usersinfo2 = $usersinfo2['response'][0];

        //status info
        if($Status == 1){
            $Status = 'Terminada';
        }

        if($Status == 3){
            $Status = 'Cancelada';
        }
        
        class_qaActivityAdd($row_usersinfo['Id'], 'qa_appointments', $CustomersId, 'Visita '.$Status, 'Comentarios: (' . $Details . ')', 2);
    }

    header('Location: ' . 'reports_qaappointments.php');
    die();
}

//appointmnets list
$qaappointmentslist = class_qaAppointmentsList();
$qaappointmentslist = class_arrayFilter($qaappointmentslist['response'], 'Status', 2, '=');
$array_appointments = array();
if ($qaappointmentslist['rows']) {
    foreach ($qaappointmentslist['response'] as $row_qaappointmentslist) {
        $qacustomersinfo      = class_qaCustomersInfo($row_qaappointmentslist['CustomersId']);
        $row_qacustomersinfo  = $qacustomersinfo['response'][0];
        $array_appointments[] = array('label' => $row_qaappointmentslist['DateSet'] . ' (' . $row_qacustomersinfo['FullName'] . ')', 'value' => $row_qaappointmentslist['Id'], 'selected' => $Id);
    }
}

//Status list
$Status = 1;
$array_status   = array();
$array_status[] = array('label' => 'Terminar', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Cancelar', 'value' => '3', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Visita'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomersId', 'value' => $array_appointments),
    'Comentarios' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    'Estado'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_FINISHED => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK     => array('buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => $_SERVER['PHP_SELF']),
);

//set params for form
$formParams = array(
    'name'    => 'Terminar visita',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

print class_formGenerator($formParams, $formFields, $formButtons);