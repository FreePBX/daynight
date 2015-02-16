<?php
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2015 Sangoma Technologies.
$daynightcodes = daynight_list();
$daynightcodes = $daynightcodes?$daynightcodes:array();
foreach ($daynightcodes as $row) {
	$fcc = new featurecode('daynight', 'toggle-mode-'.$row['ext']);
	$fc = $fcc->getCode();
	unset($fcc);
	$dnobj = daynight_get_obj($row['ext']);
	$color = $dnobj['state'] == 'DAY' ? "success" : "danger";

	$trows .= '<tr><td>';
	$trows .= '<a href="?display=daynight&view=form&itemid='.urlencode($row['ext']).'&extdisplay='.urlencode($row['ext']).'">';
	$trows .= $fc;
	$trows .= '</a>';
	$trows .= '</td>';
	$trows .= '<td>';
	$trows .= $row['dest'];
	$trows .= '</td>';
	$trows .= '<td>';
	$trows .= '<div class="text-'.$color.'">'.$dnobj['state'].'</div>';
	$trows .= '</td></tr>';
}

?>
<table class="table table-striped">
<thead>
	<tr>
		<th><?php echo _("Feature Code")?></th>
		<th><?php echo _("Destination")?></th>
		<th><?php echo _("State")?></th>
	</tr>	
</thead>
<tbody>
	<?php echo $trows ?>
</tbody>
</table>