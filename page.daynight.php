<?php 
/* $Id: page.ivr.php 3790 2007-02-16 18:52:53Z p_lindheimer $ */
//Copyright (C) 2007 Atengo LLC (info@atengo.net)
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.

$dispnum = "daynight"; //used for switch on config.php

$action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
$password = isset($_REQUEST['password'])?$_REQUEST['password']:'';
$fc_description = isset($_REQUEST['fc_description'])?$_REQUEST['fc_description']:'';

isset($_REQUEST['itemid'])?$itemid=mysql_real_escape_string($_REQUEST['itemid']):$itemid='';


$fcc = new featurecode('daynight', 'toggle-mode');
$fc = $fcc->getCodeActive();
unset($fcc);

$daynightcodes = daynight_list();
?>

</div> <!-- end content div so we can display rnav properly-->

<!-- right side menu -->
<div class="rnav"><ul>
    <li><a id="<?php echo ($itemid=='' ? 'current':'') ?>" href="config.php?display=<?php echo urlencode($dispnum)?>&action=add"><?php echo _("Add Day/Night Code")?></a></li>
<?php
if (isset($daynightcodes)) {
	foreach ($daynightcodes as $code) {
		echo "<li><a id=\"".($itemid==$code['ext'] ? 'current':'')."\" href=\"config.php?display=".urlencode($dispnum)."&itemid=".urlencode($code['ext'])."&action=edit\">($fc{$code['ext']}) {$code['dest']}</a></li>";
	}
}
?>
</ul></div>
<?php

switch ($action) {
	case "add":
		daynight_show_edit($_POST,'add');
		break;
	case "edit":
		daynight_show_edit($_POST);
		break;
	case "edited":
			daynight_edit($_POST,$itemid);
			redirect_standard('itemid');
			break;
	case "delete":
			daynight_del($itemid);
			redirect_standard();
			break;
	default:
		daynight_show_edit($_POST,'add');
		break;
}

function daynight_show_edit($post, $add="") {
	global $db;
	global $itemid;

	$fcc = new featurecode('daynight', 'toggle-mode');
	$code = $fcc->getCodeActive().$itemid;
	unset($fcc);

	$dests = daynight_get_obj($itemid);
	$password = isset($dests['password'])?$dests['password']:$password;
	$fc_description = isset($dests['fc_description'])?$dests['fc_description']:'';
	$state = isset($dests['state'])?$dests['state']:'DAY';
?>
	<div class="content">
	<h2><?php echo _("Day / Night Mode Control"); ?></h2>

<?php
	$delURL = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'&action=delete';
?>
<?php		if ($itemid != ""){ ?>
	<p><a href="<?php echo $delURL ?>"><?php echo _("Delete Day/Night Feature Code:")?> <?php echo $code; ?></a></p>
<?php		} ?>

	<form name="prompt" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return prompt_onsubmit();">
	<input type="hidden" name="action" value="edited" />
	<input type="hidden" name="display" value="daynight" />
	<input name="Submit" type="submit" style="display:none;" value="save" />
	<table>
	<tr>
		<td colspan=2><hr />
		</td>
	</tr>
	<tr>
		<td colspan="2">	
		<input name="Submit" type="submit" value="<?php echo _("Save")?>">
		<?php if ($itemid != '') echo "&nbsp ".sprintf(_("Use feature code: %s to toggle DAY/NIGHT mode"),"<strong>".$code."</strong>")?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		<hr />
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Day/Night Feature Code Index:")?>
		<span><?php echo _("There are a total of 10 Feature code objects, 0-9, each can control a call flow and be toggled using the day/night feature code plus the index.")?>
		</span></a>
		</td>
		<td>
<?php
			if ($add == "add" && $itemid =="") {
?>
			<select name="itemid"/>
			<?php
				$ids = daynight_get_avail();
				foreach ($ids as $id) {
					echo '<option value="'.$id.'" >'.$id.'</option>';
				}
			?>
			</select>
<?php
			} else {
?>
		<input readonly="yes" size="1" type="text" name="itemid" value="<?php  echo $itemid ?>">
<?php
		}
?>
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Description")?>:<span><?php echo _('Description for this Day/Night Control')?></span></a></td>
		<td><input size="40" type="text" name="fc_description" value="<?php  echo $fc_description ?>">
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Current Mode:")?>
		<span><?php echo _("This will change the current state for this Day/Night Mode Control, or set the intial state when creating a new one.")?>
		</span></a>
		</td>
		<td>
			<select name="state"/>
				<option value="DAY" <?php echo ($state == 'DAY' ? 'SELECTED':'') ?> >Day</option> 
				<option value="NIGHT" <?php echo ($state == 'NIGHT' ? 'SELECTED':'') ?> >Night</option> 
			</select>
		</td>
	</tr>
	<tr>
		<td><a href="#" class="info"><?php echo _("Optional Password")?>:<span><?php echo _('You can optionally include a password to authenticate before toggling the day/night mode. If left blank anyone can use the feature code will be un-protected')?></span></a></td>
		<td><input size="12" type="text" name="password" value="<?php  echo $password ?>">
		</td>
	</tr>
	<tr>
		<td colspan=2>
		<hr />
		</td>
	</tr>
<?php
	// Draw the destinations
	// returns an array, $dest['day'], $dest['night']
	// and puts null if nothing set

	drawdestinations(0, _("DAY"),   $dests['day']);
	drawdestinations(1, _("NIGHT"), $dests['night']);

	//TODO: Check to make sure a destination radio button was checked, and if custom, that it was not blank
	//
?>
	<tr>
		<td colspan=2>	
		<input name="Submit" type="submit" value="<?php echo _("Save")?>">
		<?php if ($itemid != '') echo "&nbsp ".sprintf(_("Use feature code: %s to toggle DAY/NIGHT mode"),"<strong>".$code."</strong>")?>
		</td>
	</tr>
	<tr>
		<td colspan=2>
		<hr />
		</td>
	</tr>
	</table>

	<script language="javascript">
	<!--
	var theForm = document.prompt;

	function prompt_onsubmit() {
		var msgInvalidPassword = "<?php echo _('Please enter a valid numeric password, only numbers are allowed'); ?>";

		defaultEmptyOK = true;
		if (!isInteger(theForm.password.value))
			return warnInvalid(theForm.password, msgInvalidPassword);
		return true;
	}
	//-->
	</script>

	</form>
	</div>
<?php
} //daynight function


// count is for the unique identifier
// dest is the target
//
function drawdestinations($count, $mode, $dest) { ?>
	<tr> 
		<td style="text-align:right;">
		<a href="#" class="info"><strong><?php echo _("$mode")?></strong><span><?php echo _("Destination to use when set to $mode mode")?></span></a>
		</td>
		<td> 
			<table> <?php echo drawselects($dest,$count); ?> 
			</table> 
		</td>
	</tr>
	<tr><td colspan=2><hr /></td></tr>
<?php
}
?>
