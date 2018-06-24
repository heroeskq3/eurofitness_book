<?php
//define vars
if (!$row_userstypeinfo['Admin']) {

    if(isset($_GET['Agente'])){
        $_GET['Agente'] = $_GET['Agente'];
    }else{
        $_GET['Agente'] = $row_usersinfo['UserName'];
    }
}

//customers list
$qacustomerslist       = class_qaCustomersList();
$array_qacustomerslist = array();
if ($qacustomerslist['rows']) {
    foreach ($qacustomerslist['response'] as $row_qacustomerslist) {

        //users info
        if ($row_qacustomerslist['UsersId']) {
            $qausersinfo     = class_usersInfo($row_qacustomerslist['UsersId']);
            $row_qausersinfo = $qausersinfo['response'][0];
        } else {
            $row_qausersinfo['UserName'] = 'Undefined';
        }

        //classes info
        if ($row_qacustomerslist['ClassesId']) {
            $qaclassesinfo     = class_qaClassesInfo($row_qacustomerslist['ClassesId']);
            $row_qaclassesinfo = $qaclassesinfo['response'][0];
        } else {
            $row_qaclassesinfo['Name'] = 'Undefined';
        }

        //category info
        if ($row_qacustomerslist['CategoryId']) {
            $qacategoryinfo     = class_qaCategoryInfo($row_qacustomerslist['CategoryId']);
            $row_qacategoryinfo = $qacategoryinfo['response'][0];
        } else {
            $row_qacategoryinfo['Name'] = 'Undefined';
        }

        if ($row_qacustomerslist['LastVisit']) {
            $date = $row_qacustomerslist['LastVisit'];
        } else {
            $date = $row_qacustomerslist['CreateDate'];
        }

        //context
        $context     = class_qacustomerscontext($date, $row_qaclassesinfo['Period'], 365);
        $row_context = $context['response'];

        $array_qacustomerslist[] = array(

            //Define custom Patern Table Alias Keys => Values
            'ID'          => $row_qacustomerslist['Id'],
            LANG_NAME     => $row_qacustomerslist['FullName'] . $row_context['test'],
            'Agente'      => $row_qausersinfo['UserName'],
            'Clase'       => $row_qaclassesinfo['Name'],
            LANG_CATEGORY => $row_qacategoryinfo['Name'],

            'Tel1'        => $row_qacustomerslist['Phone'],
            'Tel2'        => $row_qacustomerslist['Phone2'],
            'Contacto'    => $row_qacustomerslist['Contact'],
            'Celular'     => $row_qacustomerslist['Mobile'],
            'E-Mail'      => $row_qacustomerslist['Email'],
            LANG_COUNTRY  => $row_qacustomerslist['Country'],
            'Provincia'   => $row_qacustomerslist['State'],
            'Ciudad'      => $row_qacustomerslist['City'],
            LANG_DATE     => $date,
            LANG_STATUS   => $row_context['status'],

            //Define Index, Status, Childs
            'index'       => $row_qacustomerslist['Id'],
            'status'      => $row_context['status'], //use = 1 or 0
            'context'     => $row_context['context'], //use bootsrap context (danger, warning, success, info)
            'childs'      => null,
        );
    }
}

$reportsParams = array(
    'searchbar' => true,
    'filterbar' => true,
    'filter'    => true,
    'search'    => true,
    'resume'    => true,
    'order'     => true,
    'table'     => true,
    'limit'     => 10,
    'hidecols'  => '0,5,6,7,8,9,10,12',
    'add'       => 'qa_customers.php',
    'edit'      => 'qa_customers.php',
    'delete'    => 'qa_customers.php',
    'schedule'  => 'qa_appointments.php',
    'transfer'  => 'qa_transfers.php',
    'status'    => true,
);

//generate reports
print class_reportsGenerator2($array_qacustomerslist, $reportsParams, null);
