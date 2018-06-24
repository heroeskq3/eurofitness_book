<?php
if ($form_add) {
    $qatransfersupdate = class_qaTransfersUpdate($CustomersId, $UsersId, 1);

    //set activity
    if ($qatransfersupdate['rows']) {
        $usersinfo2     = class_usersInfo($UsersId);
        $row_usersinfo2 = $usersinfo2['response'][0];
        class_qaActivityAdd($row_usersinfo['Id'], 'qa_customers', $CustomersId, 'Transferencia de Cliente', 'Recibe: "' . $row_usersinfo2['UserName'] . '" Motivo: (' . $Details . ')', 2);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}
//customers list
if ($row_userstypeinfo['Admin']) {
    $qacustomerslist = class_qaCustomersList();

} else {
    $qacustomerslist = class_qaCustomersList();
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $_SESSION['UserId'], '=');
}

//customers
$array_customers = array();
if ($qacustomerslist['rows']) {
    foreach ($qacustomerslist['response'] as $row_qacustomerslist) {
        $array_customers[] = array('label' => $row_qacustomerslist['FullName'], 'value' => $row_qacustomerslist['Id'], 'selected' => $Id);
    }
}

//users list
$userslist   = class_usersList(null);
$array_users = array();
if ($userslist['rows']) {
    foreach ($userslist['response'] as $row_userslist) {
        $array_users[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $_SESSION['UserId']);
    }
}

//Form Generator
$formFields = array(
    'form_add' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Cliente'  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomersId', 'value' => $array_customers),
    'Destino'  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'UsersId', 'value' => $array_users),
    'Motivo'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Details', 'value' => $Details),
);

// define buttons for form
$formButtons = array(
    'Transferir' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK    => array('buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => $_SERVER['PHP_SELF']),
);

//set params for form
$formParams = array(
    'name'    => 'Transferir Cliente',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

print class_formGenerator($formParams, $formFields, $formButtons);
