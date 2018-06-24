<?php
$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
    'schedule'    => true,
    'export'      => false,
);

//Table Main
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $qaclassesinfo     = class_qaClassesInfo($row_array['ClassesId']);
            $row_qaclassesinfo = $qaclassesinfo['response'][0];

            $qacategoryinfo     = class_qacategoryInfo($row_array['CategoryId']);
            $row_qacategoryinfo = $qacategoryinfo['response'][0];

            $usersinfo     = class_usersInfo($row_array['UsersId']);
            $row_usersinfo = $usersinfo['response'][0];

            if ($row_array['Id']) {
                $qaappointmentslist           = class_qaAppointmentsList($row_array['Id']);
                $recordset_qaappointmentslist = $qaappointmentslist['response'];
                $qaappointmentslist           = class_arrayFilter($recordset_qaappointmentslist, 'CustomersId', $row_array['Id'], '=');
            } else {
                $qaappointmentslist['rows'] = 0;
            }

            $array_appointments = $qaappointmentslist['rows'];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Cliente' => $row_array['FullName'],
                'Clase'   => $row_qaclassesinfo['Name'],
                'Usuario' => $row_usersinfo['UserName'],
                'Citas'   => $qaappointmentslist['rows'],
                'Estado'  => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'   => $row_array['Id'],
                'status'  => null, //use = 1 or 0
                'childs'  => $array_appointments, //define array
            );
        }
    }

    return $results;
}

if ($row_userstypeinfo['Admin']) {
    $qacustomerslist = class_qaCustomersList();
} else {
    $qacustomerslist = class_qaCustomersList();
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $_SESSION['UserId'], '=');
}

if ($Id) {
    $qacustomerslist = class_qaCustomersList();
    $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $Id, '=');
}

$table_array = class_tableMainList($qacustomerslist);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
