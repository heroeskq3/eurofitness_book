<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Clases',
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
        require_once '../class/views/qa/classes/qa_classesadd.php';
        require_once '../class/views/qa/classes/qa_classeslist.php';
        break;

    case 'add':
        require_once '../class/views/qa/classes/qa_classesadd.php';
        require_once "class/views/qa/classes/qa_classeslist.php";
        break;

    case 'update':
        require_once '../class/views/qa/classes/qa_classesupdate.php';
        break;

    case 'delete':
        require_once '../class/views/qa/classes/qa_classesdelete.php';
        break;
}

require_once 'footer.php';
