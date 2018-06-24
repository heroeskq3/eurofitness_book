<?php
function class_reportsSearch($array)
{
	$search = null;
	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}

    if ($search) {

        $array = class_arrayFilter($array, 'Nombre', $_GET['search'], 'contains');
        $array = $array['response'];

    }
    return $array;
}
