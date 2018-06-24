<?php
$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
);

//Table Main
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Categoría' => $row_array['Name'],
                'Estado'    => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'     => $row_array['Id'],
                'status'    => null, //use = 1 or 0
                'childs'    => null, //define array
            );
        }
    }

    return $results;
}

$qacategorylist = class_qaCategoryList();
$table_array    = class_tableMainList($qacategorylist);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
print class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
