<?php
if ($form_update) {
    class_qaCategoryUpdate($Id, $Name, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Info
$qacategoryinfo     = class_qaCategoryInfo($Id);
$row_qacategoryinfo = $qacategoryinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_qacategoryinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_qacategoryinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Categoría'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_qacategoryinfo['Name']),
    'Estado'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
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