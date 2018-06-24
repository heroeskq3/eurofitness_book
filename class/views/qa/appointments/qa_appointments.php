
<ul class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true"><?php echo LANG_LIST; ?></a></li>
    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false"><?php echo LANG_ADD; ?></a></li>
</ul>

    <div class="tab-content">
    <div class="tab-pane fade active in" id="home">
    <?php require_once '../class/views/qa/appointments/qa_appointmentslist.php'; ?>
    </div>
    <div class="tab-pane fade" id="profile">
    <?php require_once '../class/views/qa/appointments/qa_appointmentsadd.php'; ?>
    </div>
    <div class="tab-pane fade" id="messages">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    </div>