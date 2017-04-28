<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
/* $Id: page.ivr.php 3790 2007-02-16 18:52:53Z p_lindheimer $ */
$request = $_REQUEST;
$dispnum = "daynight"; //used for switch on config.php
$tabindex = 0;
$heading = _("Call Flow Toggle Control");
$request["view"] = !empty($request["view"]) ? $request["view"] : "";
$usagehtml = '';
switch($request["view"]){
	case "form":
		if(isset($request['itemid'])){
			$usage_list = framework_display_destination_usage(daynight_getdest($request['itemid']));
			if(!empty($usage_list)){
				$usagehtml = <<< HTML
<div class="panel panel-default fpbx-usageinfo">
	<div class="panel-heading">
		$usage_list[text]
	</div>
	<div class="panel-body">
		$usage_list[tooltip]
	</div>
</div>

HTML;
			}
			$heading .= _(": Edit");
		}else{
			$heading .= _(": Add");
		}
		$content = load_view(__DIR__.'/views/form.php', array('request' => $request));
	break;
	default:
		$content = load_view(__DIR__.'/views/grid.php');
	break;
}

?>
<div class="container-fluid">
	<h1><?php echo $heading ?></h1>
	<?php echo $usagehtml?>
	<div class = "display full-border">
		<div class="row">
			<div class="col-sm-12">
				<div class="fpbx-container">
					<div class="display <?php echo empty($_REQUEST['view']) ? "no" : "full"?>-border">
						<?php echo $content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
