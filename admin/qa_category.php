<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'QA - Categorías',
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
        require_once '../class/views/qa/category/qa_categoryadd.php';
        require_once '../class/views/qa/category/qa_categorylist.php';
        break;

    case 'add':
        require_once '../class/views/qa/category/qa_categoryadd.php';
        require_once '../class/views/qa/category/qa_categorylist.php';
        break;

    case 'update':
        require_once '../class/views/qa/category/qa_categoryupdate.php';
        break;

    case 'delete':
        require_once '../class/views/qa/category/qa_categorydelete.php';
        break;
}

require_once 'footer.php';