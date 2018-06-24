<?php
if ($form_update) {
    $qaappointmentsupdate = class_qaAppointmentsUpdate($Id, $UsersId, $CustomersId, $DateSet, $TimeSet, $Details, $Status);

    //Activity
    if ($qaappointmentsupdate['rows']) {
        $LastVisit = $DateSet.' '.$TimeSet;
        class_qaCustomersLastVisit($CustomersId, $LastVisit);
    }
    
    //set activity
    if($qaappointmentsupdate['rows']){
        class_qaActivityAdd($UsersId, 'qa_appointments', $CustomersId, 'Visita Cambiada', $Details, 2);
    }

    header('Location: ' . $_SERVER['PHP_SELF'].'?action=next&Id='.$CustomersId);
    die();
}

//Info
$qaappointmentsinfo     = class_qaAppointmentsInfo($Id);
$row_qaappointmentsinfo = $qaappointmentsinfo['response'][0];

//users list
if ($row_userstypeinfo['Admin']) {
    $userslist = class_usersList(null);
    $userslist = class_arrayFilter($userslist['response'], 'Level', $row_userstypeinfo['Level'], '>=');
} else {
    $userslist = class_usersList($_SESSION['UserId']);
}
$array_users = array();
if ($userslist['rows']) {
    foreach ($userslist['response'] as $row_userslist) {
        $array_users[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $row_qaappointmentsinfo['UsersId']);
    }
}

//customers list
if ($row_userstypeinfo['Admin']) {
    $qacustomerslist = class_qaCustomersList();
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'Status', 1, '=');

} else {
    $qacustomerslist = class_qaCustomersList();
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'Status', 1, '=');
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $_SESSION['UserId'], '=');
}

$array_customers = array();
if ($qacustomerslist['rows']) {
    foreach ($qacustomerslist['response'] as $row_qacustomerslist) {
        $array_customers[] = array('label' => $row_qacustomerslist['FullName'], 'value' => $row_qacustomerslist['Id'], 'selected' => $row_qaappointmentsinfo['CustomersId']);
    }
}

if ($row_userstypeinfo['Admin']) {
    $admin_users = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'UsersId', 'value' => $array_users);
} else {
    $admin_users = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'UsersId', 'value' => $row_qaappointmentsinfo['UsersId']);
}
//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Usuario'     => $admin_users,
    'Cliente'     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomersId', 'value' => $array_customers),
    'Fecha'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'date', 'required' => true, 'position' => 1, 'name' => 'DateSet', 'value' => $row_qaappointmentsinfo['DateSet']),
    'Hora'        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'TimeSet', 'value' => $row_qaappointmentsinfo['TimeSet']),
    'Comentarios' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Details', 'value' => $row_qaappointmentsinfo['Details']),
    'Estado'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Status', 'value' => $row_qaappointmentsinfo['Status']),
);

// define buttons for form
$formButtons = array(
    'Next' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => $_SERVER['PHP_SELF']),
);

//set params for form
$formParams = array(
    'name'    => 'Add',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

print class_formGenerator($formParams, $formFields, $formButtons);
