<?php
if ($form_update) {
    
    //patch for state id reverse
    if($State){
        $zonesinfo = class_zonesInfo($State);
        $row_zonesinfo = $zonesinfo['response'][0];
        $State = $row_zonesinfo['Name'];
    }

    class_qaCustomersUpdate($Id, $CategoryId, $UsersId, $ClassesId, $FullName, $Phone, $Phone2, $Contact, $Mobile, $Email, $Country, $State, $City, $Address, $Status);

    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Customers Info
$qacustomersinfo     = class_qaCustomersInfo($Id);
$row_qacustomersinfo = $qacustomersinfo['response'][0];

//users list
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

//STATES
$stateslist   = class_zonesList(4); //set default Costa Rica Zones Id
$stateslist   = class_arrayFilter($stateslist['response'], 'Status', '1', '=');
$array_states = array();
$array_cities = array();
if ($stateslist['rows']) {
    
    //patch for state id reverse
    if($row_qacustomersinfo['State']){
        $zonesinfo = class_zonesList(4);
        $zonesinfo   = class_arrayFilter($zonesinfo['response'], 'Name', $row_qacustomersinfo['State'], '=');
        $row_zonesinfo = $zonesinfo['response'][0];
        $State = $row_zonesinfo['Id'];
    }

    foreach ($stateslist['response'] as $row_stateslist) {

        $array_states[] = array('label' => $row_stateslist['Name'], 'value' => $row_stateslist['Id'], 'selected' => $State);

        //CITIES
        $citieslist   = class_zonesList($row_stateslist['Id']);
        $citieslist   = class_arrayFilter($citieslist['response'], 'Status', '1', '=');
        if ($citieslist['rows']) {
            foreach ($citieslist['response'] as $row_citieslist) {
                $array_cities[] = array('patern' => $row_citieslist['ZonesId'], 'label' => $row_citieslist['Name'], 'value' => $row_citieslist['Name'], 'selected' => $row_qacustomersinfo['City']);
            }
        }

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
    'Cliente'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'FullName', 'value' => $row_qacustomersinfo['FullName']),
    'Teléfono'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone', 'value' => $row_qacustomersinfo['Phone']),
    'Teléfono 2'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone2', 'value' => $row_qacustomersinfo['Phone2']),
    'Contacto'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Contact', 'value' => $row_qacustomersinfo['Contact']),
    'Celular'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Mobile', 'value' => $row_qacustomersinfo['Mobile']),
    'E-Mail'        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'email', 'required' => false, 'position' => 1, 'name' => 'Email', 'value' => $row_qacustomersinfo['Email']),
    
    LANG_COUNTRY  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Country', 'value' => $row_qacustomersinfo['Country']),

    //SELECT AJAX ONCHANGE
    LANG_STATE    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange1', 'required' => false, 'position' => 1, 'name' => 'State', 'value' => $array_states),
    LANG_CITY     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange2', 'required' => false, 'position' => 1, 'name' => 'City', 'value' => $array_cities),

    LANG_ADDRESS  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Address', 'value' => $row_qacustomersinfo['Address']),

    'Estado'        => $admin_status,
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
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
