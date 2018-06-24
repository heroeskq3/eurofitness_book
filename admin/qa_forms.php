<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Clientes',
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
        require_once '../class/views/qa/customers/qa_customersadd.php';
        require_once '../class/views/qa/customers/qa_customerslist.php';
        break;

    case 'add':
        require_once '../class/views/qa/customers/qa_customersadd.php';
        break;

    case 'update':
        require_once '../class/views/qa/customers/qa_customersupdate.php';
        break;

    case 'delete':
        require_once '../class/views/qa/customers/qa_customersdelete.php';
        break;
        
    case 'schedule':
        header('Location: qa_appointments.php?action=add&Id=' . $Id);
        break;
        
    case 'transfer':
        require_once '../class/views/qa/transfers/qa_transfersadd.php';
        break;
}
require_once 'footer.php';
