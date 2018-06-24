<?php
$table_params = array(
	'name' => false,
	'searchbar' => true,
	'rowsbypage' => 10,
	'showactions' => true,
	'showmore' => false,
	'checkbox' => false,
	'export' => true,
);

//Table Main
function class_tableMainList($array) {
	$results = array();
	if ($array['rows']) {
		foreach ($array['response'] as $row_array) {

			$qacustomersinfo = class_qaCustomersInfo($row_array['CustomersId']);
			$row_qacustomersinfo = $qacustomersinfo['response'][0];

			$usersinfo = class_usersInfo($row_array['UsersId']);
			$row_usersinfo = $usersinfo['response'][0];

			$results[] = array(
				//Define custom Patern Table Alias Keys => Values
				'Usuario' => $row_usersinfo['UserName'],
				'Cliente' => $row_qacustomersinfo['FullName'],
				'Fecha Visita' => $row_array['DateSet'],
				'Comentarios' => $row_array['Details'],
				'Estado' => $row_array['Status'],

				//Define Index, Status, Childs
				'index' => $row_array['Id'],
				'status' => null, //use = 1 or 0
				'childs' => null, //define array
			);
		}
	}

	return $results;
}
if ($row_userstypeinfo['Admin']) {
	$qaappointmentslist = class_qaAppointmentsList();
	$qaappointmentslist = class_qaAppointmentsStatus($qaappointmentslist['response']);
} else {
	$qaappointmentslist = class_qaAppointmentsList();
	$qaappointmentslist = class_qaAppointmentsStatus($qaappointmentslist['response']);
	$qaappointmentslist = class_arrayFilter($qaappointmentslist['response'], 'UsersId', $_SESSION['UserId'], '=');
}

$table_array = class_tableMainList($qaappointmentslist);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
print class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
