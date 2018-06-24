<?php
//users list
if ($row_userstypeinfo['Admin']) {
    $userslist = class_usersList(null);
    $userslist = class_arrayFilter($userslist['response'], 'Level', $row_userstypeinfo['Level'], '>=');
} else {
    $userslist = class_usersList($_SESSION['UserId']);
}

if ($userslist['rows']) {
    $table_array = array();
    foreach ($userslist['response'] as $row_userslist) {

        //find label for users type info
        $userstypeinfo     = class_usersTypeInfo($row_userslist['TypeId']);
        $row_userstypeinfo = $userstypeinfo['response'][0];

        //find label for users type info
        if ($row_userslist['UsersIndex']) {
            $usersdetailsinfo                 = class_usersDetailsInfo($row_userslist['UsersIndex']);
            $row_usersdetailsinfo             = $usersdetailsinfo['response'][0];
            $row_usersdetailsinfo['FullName'] = $row_usersdetailsinfo['FirstName'] . ' ' . $row_usersdetailsinfo['LastName'];
        } else {
            $row_usersdetailsinfo['FullName'] = null;
        }

        $qacustomerslist = class_qaCustomersList();
        $qacustomerslist = class_arrayFilter($qacustomerslist['response'], 'UsersId', $row_userslist['Id'], '=');

        $table_array[] = array(
            //Define custom Patern Table Alias Keys => Values
            'Username' => $row_userslist['UserName'],
            'Nombre'   => $row_usersdetailsinfo['FullName'],
            'Tipo'     => $row_userstypeinfo['Name'],
            'Clientes' => $qacustomerslist['rows'],
            'Estado'   => class_statusInfo($row_userslist['Status']),

            //Define Index, Status, Childs
            'index'    => $row_userslist['Id'],
            'status'   => $row_userslist['Status'], //use = 1 or 0
            'childs'   => $qacustomerslist['rows'], //define array
        );
    }
}
$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => true,
    'checkbox'    => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
print class_tableGenerator($table_array, $table_params, $formParams, $formButtons);