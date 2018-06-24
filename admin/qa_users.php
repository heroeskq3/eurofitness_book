<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Usuarios',
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
        require_once '../class/views/qa/users/qa_usersadd.php';
        require_once '../class/views/qa/users/qa_userslist.php';
        break;

    case 'add':
        require_once '../class/views/qa/users/qa_usersadd.php';
        require_once '../class/views/qa/users/qa_userslist.php';
        break;

    case 'update':
        require_once '../class/views/qa/users/qa_usersupdate.php';
        break;

    case 'delete':
        require_once '../class/views/qa/users/qa_usersdelete.php';
        break;
}

require_once 'footer.php';
