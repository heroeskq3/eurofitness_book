<?php
date_default_timezone_set('America/Costa_Rica');

$dateStart = strtotime("now");
$dateEnd   = strtotime("+30 day");

for ($i = $dateStart; $i <= $dateEnd; $i += 86400) {

    $dateWeekName   = date("D", $i);
    $dateWeekNumber = date("N", $i);

    if ($dateWeekNumber > 0 && $dateWeekNumber < 6) {
        //    echo date("D d M - h:i:s", $i)."<br>";
    }
    if ($dateWeekNumber == 6) {
        //    echo "<br>";
    }

}

//exit;
$array_qnty      = array();
$array_multiplos = array(10, 15, 20, 25, 30, 35, 40, 45, 50, 100, 150, 200);
foreach ($array_multiplos as $key => $i) {
    $array_qnty[] = array('label' => $i, 'value' => $i, 'selected' => $limit);
}

require_once 'header.php'
?>
<div class="tab-content">
<div class="tab-pane" id="about">
<div class="row">
	<div class="col-sm-6 col-sm-offset-1">
	<div class="picture-container">
	<div class="picture">
				<img src="assets/site/img/default-avatar.png" class="picture-src" />
        </div>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-1">
												<div class="input-group">
<span class="input-group-addon">
<i class="material-icons">email</i>
</span>
<div class="form-group label-floating">
	<label class="control-label">Email <small>(required)</small></label>
	<input name="email" type="email" class="form-control">
	                </div>
												</div>
</div>
    	</div>
    </div>
    <div class="tab-pane" id="account">
<h4 class="info-text"> What are you doing? (checkboxes) </h4>
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="col-sm-12">
<div class="choice" data-toggle="wizard-checkbox">
<input type="checkbox" name="jobb" value="Design">
<div class="icon">
<i class="fa fa-calendar"></i>
</div>
<div class="form-group label-floating is-empty">
                    <label class="control-label">Reserve su fecha</label>
<select name="country" class="form-control">
<option disabled="" selected=""></option>
<option value="Afghanistan"> Afghanistan </option>
</select>
                <span class="material-input"></span></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="address">
        <div class="row">
<div class="col-sm-12">
<h4 class="info-text"> Are you living in a nice area? </h4>
</div>
<div class="col-sm-7 col-sm-offset-1">
		<div class="form-group label-floating">
			<label class="control-label">Street Name</label>
				<input type="text" class="form-control">
		</div>
</div>
<div class="col-sm-3">
<div class="form-group label-floating">
<label class="control-label">Street Number</label>
<input type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group label-floating">
<label class="control-label">City</label>
<input type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group label-floating">
<label class="control-label">Country</label>
<select name="country" class="form-control">
<option disabled="" selected=""></option>
<option value="Afghanistan"> Afghanistan </option>
<option value="Albania"> Albania </option>
<option value="Algeria"> Algeria </option>
<option value="American Samoa"> American Samoa </option>
<option value="Andorra"> Andorra </option>
<option value="Angola"> Angola </option>
<option value="Anguilla"> Anguilla </option>
<option value="Antarctica"> Antarctica </option>
<option value="...">...</option>
</select>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'footer.php'?>