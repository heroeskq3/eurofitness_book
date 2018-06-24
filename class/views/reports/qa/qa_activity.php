<?php

//Table Main
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $usersinfo     = class_usersInfo($row_array['UsersId']);
            $row_usersinfo = $usersinfo['response'][0];

            $qacustomersinfo     = class_qaCustomersInfo($row_array['Reference']);
            $row_qacustomersinfo = $qacustomersinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Fecha'     => $row_array['DateAdd'],
                'Responsable'   => $row_usersinfo['UserName'],
                'Actividad' => $row_array['Description'],
                'Cliente'   => $row_qacustomersinfo['FullName'],
                'Motivo'   => $row_array['Details'],

                //Define Index, Status, Childs
                'index'     => $row_array['Id'],
                'context'   => null, //use = 1 or 0
                'status'    => $row_array['Status'], //use = 1 or 0
                'childs'    => null, //define array
            );
        }
    }

    return $results;
}

if ($row_userstypeinfo['Admin']) {
    $qaactivitypendding = class_qaActivityPending();
} else {
    $qaactivitypendding = class_qaActivityPending();
    $qaactivitypendding = class_arrayFilter($qaactivitypendding['response'], 'UsersId', $_SESSION['UserId'], '=');
}

if ($Id) {
    $qaactivitypendding = class_qaActivityPending();
    $qaactivitypendding = class_arrayFilter($qaactivitypendding['response'], 'UsersId', $Id, '=');
}

$table_array = class_tableMainList($qaactivitypendding);

if($row_userstypeinfo['Admin']){
    $showaction = true; 
}else{
    $showaction = false;
}

$reportsParams = array(
    'searchbar'  => true,
    'filterbar'  => true,
    'filter'     => true,
    'search'     => true,
    'resume'     => true,
    'order'      => true,
    'table'      => true,
    'limit'      => 10,
    'hidecols'   => '',
    'showaction' => $showaction,
    'add'        => false,
    'view'       => false,
    'confirm'    => true,
);

//generate reports
print class_reportsGenerator($table_array, $reportsParams, null);
