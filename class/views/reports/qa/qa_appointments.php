<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //users info
            $qausersinfo     = class_usersInfo($row_array['UsersId']);
            $row_qausersinfo = $qausersinfo['response'][0];

            //customers info
            $qacustomersinfo     = class_qaCustomersInfo($row_array['CustomersId']);
            $row_qacustomersinfo = $qacustomersinfo['response'][0];

            $results[] = array(

                //Define custom Patern Table Alias Keys => Values
                'ID'          => $row_array['Id'],
                'Cliente'     => $row_qacustomersinfo['FullName'],
                'Agente'      => $row_qausersinfo['UserName'],
                'Fecha'       => $row_array['DateSet'],
                'Hora'        => $row_array['TimeSet'],
                'Comentarios' => $row_array['Details'],

                'Contacto'    => $row_qacustomersinfo['Contact'],
                'Teléfono'    => $row_qacustomersinfo['Phone'],
                'Teléfono 2'  => $row_qacustomersinfo['Phone2'],
                'Celular'     => $row_qacustomersinfo['Mobile'],
                'E-Mail'      => $row_qacustomersinfo['Email'],

                LANG_STATUS   => $row_array['Status'],

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'context'     => null, //warning, danger, info, success
                //'status'      => null, //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }
    return $results;
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
    'hidecols'  => '4,5,6,7,8,9,10',
    'add'       => 'qa_appointments.php',
    'edit'      => 'qa_appointments.php',
    'delete'    => 'qa_appointments.php',
    'finished'  => 'qa_finished.php',
);

//customers list
$qaappointmentslist       = class_qaAppointmentsList();
if(!$row_userstypeinfo['Admin']){
   $qaappointmentslist = class_arrayFilter($qaappointmentslist['response'], 'UsersId', $_SESSION['UserId'], '='); 
}
$qaappointmentslist       = class_qaAppointmentsStatus($qaappointmentslist['response']);
$array_qaappointmentslist = class_tableMainList($qaappointmentslist);

//generate reports
print class_reportsGenerator($array_qaappointmentslist, $reportsParams, null);
