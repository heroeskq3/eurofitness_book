<?php
if ($form_update) {
    class_qaCustomersUpdate($Id, $CategoryId, $UsersId, $ClassesId, $FullName, $Phone, $Phone2, $Contact, $Mobile, $Email, $Zone, $Details, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Customers Info
$qacustomersinfo     = class_qaCustomersInfo($Id);
$row_qacustomersinfo = $qacustomersinfo['response'][0];

//users list
$userslist   = class_usersList($_SESSION['UserId']);
$array_users = array();
if ($userslist['rows']) {
    foreach ($userslist['response'] as $row_userslist) {
        $array_users[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $row_qacustomersinfo['UsersId']);
    }
}
//category list
$qacategorylist = class_qaCategoryList();
$array_category = array();
if ($qacategorylist['rows']) {
    foreach ($qacategorylist['response'] as $row_qacategorylist) {
        $array_category[] = array('label' => $row_qacategorylist['Name'], 'value' => $row_qacategorylist['Id'], 'selected' => $row_qacustomersinfo['CategoryId']);
    }
}

//classes list
$qaclasseslist = class_qaClassesList();
$array_classes = array();
if ($qaclasseslist['rows']) {
    foreach ($qaclasseslist['response'] as $row_qaclasseslist) {
        $array_classes[] = array('label' => $row_qaclasseslist['Name'], 'value' => $row_qaclasseslist['Id'], 'selected' => $row_qacustomersinfo['ClassesId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Pendiente', 'value' => '2', 'selected' => $row_qacustomersinfo['Status']);
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_qacustomersinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_qacustomersinfo['Status']);

if ($row_userstypeinfo['Admin']) {
    $admin_status = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status);
} else {
    $admin_status = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => $row_qacustomersinfo['Status']);
}
if ($row_userstypeinfo['Admin']) {
    $admin_users = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'UsersId', 'value' => $array_users);
} else {
    $admin_users = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'UsersId', 'value' => $row_qacustomersinfo['UsersId']);
}

//Form Generator
$formFields = array(
    'form_update'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Categoría'     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CategoryId', 'value' => $array_category),
    'Usuario'       => $admin_users,
    'Clase'         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'ClassesId', 'value' => $array_classes),
    'Empresa'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'FullName', 'value' => $row_qacustomersinfo['FullName']),
    'Teléfono'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone', 'value' => $row_qacustomersinfo['Phone']),
    'Teléfono 2'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone2', 'value' => $row_qacustomersinfo['Phone2']),
    'Contacto'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Contact', 'value' => $row_qacustomersinfo['Contact']),
    'Celular'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Mobile', 'value' => $row_qacustomersinfo['Mobile']),
    'E-Mail'        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'email', 'required' => false, 'position' => 1, 'name' => 'Email', 'value' => $row_qacustomersinfo['Email']),
    'Zona'          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Zone', 'value' => $row_qacustomersinfo['Zone']),
    'Observaciones' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_qacustomersinfo['Details']),
    'Estado'        => $admin_status,
);

// define buttons for form
$formButtons = array(
    'Finish' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => $_SERVER['PHP_SELF']),
);

//set params for form
$formParams = array(
    'name'    => 'Update',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

class_formGenerator($formParams, $formFields, $formButtons);
