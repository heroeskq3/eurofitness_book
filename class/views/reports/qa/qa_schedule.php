<?php
$begin = new DateTime('2018-04-02');
$end   = new DateTime('2018-04-08');
$end->modify('+1 day');

$interval = DateInterval::createFromDateString('1 day');
$period   = new DatePeriod($begin, $interval, $end);

$daylist = array();
foreach ($period as $dt) {

    //determine date week
    $daylist[] = $dt->format("Y-m-d");
}

?>
<table id="example" class="table table-striped table-hover table-bordered nowrap" style="width:100%">
    <thead>
    <tr>
        <th><?php echo LANG_DAYS; ?></th>
        <th><?php echo LANG_DETAILS; ?></th>
    </tr>
</thead>
<tbody>
    <?php foreach ($daylist as $key_daylist => $row_daylist) {
    $date = $row_daylist;
    ?>
    <tr>
        <!-- DAY WEEK -->
        <td>
            <?php
$dayname = date("l", strtotime($date));
    echo class_infoDay($dayname);
    ?>
        </td>

        <!-- ZONES -->
        <td>
    <?php
//get appointments list for this day
    $qaschedulelist = class_qaScheduleList($date);
    $zones          = class_arrayGroup($qaschedulelist['response'], 'Zone');
    if (0) {
        echo "<pre>";
        print_r($qaschedulelist);
    }
    ?>
<?php if ($qaschedulelist['rows']) {
        ?>
        <table class="">
            <?php foreach ($zones['response'] as $key_zones => $row_zones) {?>
            <tr>
                <td><?php echo $row_zones['Zone'] ?></td>
                <td>
                    <table>
                        <?php
$customers = class_arrayFilter($qaschedulelist['response'], 'Zone', $row_zones['Zone'], '=');
            foreach ($customers['response'] as $key_customers => $row_customers) {
                ?>
                        <tr>
                            <td scope="col"><?php echo $row_customers['Customer']; ?></td>
                        </tr>
                        <?php }?>
                    </table>
                </td>
            </tr>
            <?php }?>
        </table>
<?php }?>
        </td>
    </tr>
    <?php }?>
</tbody>
</table>