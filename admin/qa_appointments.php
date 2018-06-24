<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Visitas',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => true,
    'navbar'      => true,
    'sidebar'     => true,
    'searchbar'   => false,
    'style'       => true,
    'debug'       => false,
);
require_once 'header.php';

//methods
switch ($action) {

    default:
        require_once '../class/views/qa/appointments/qa_appointments.php';
        break;

    case 'add':
        require_once '../class/views/qa/appointments/qa_appointmentsadd.php';
        break;
    case 'next':
        require_once '../class/views/qa/customers/qa_customersupdate.php';
        break;

    case 'update':
        require_once '../class/views/qa/appointments/qa_appointmentsupdate.php';
        break;

    case 'CustomersId':
        require_once '../class/views/qa/customers/qa_customersadd.php';
        break;

    case 'delete':
        require_once '../class/views/qa/appointments/qa_appointmentsdelete.php';
        break;
}

require_once 'footer.php';
