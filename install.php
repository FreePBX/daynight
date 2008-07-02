<?php

$sql = "CREATE TABLE IF NOT EXISTS daynight 
        (
				ext varchar(10) NOT NULL default '',
				dmode varchar(40) NOT NULL default '',
			  dest varchar(255) NOT NULL default '',
				PRIMARY KEY (ext, dmode)
			  );
			 ";
$check = $db->query($sql);
if(DB::IsError($check)) {
	die_freepbx("Can not create daynight table");
}

// Get the old feature code if it existed to determine
// if it had been changed and if it was enabled
//
$delete_old = false;
$fcc = new featurecode('daynight', 'toggle-mode');
$code = $fcc->getCode();
if ($code != '') {
	$delete_old = true;
	$enabled = $fcc->isEnabled();
	$fcc->delete();
}
unset($fcc);	

// If we found the old one then we must create all the new ones
//
if ($delete_old) {
	$list = daynight_list();
	foreach ($list as $item) {
		$id = $item['ext'];
		$fc_description = $item['dest'];
		$fcc = new featurecode('daynight', 'toggle-mode-'.$id);
		if ($fc_description) {
			$fcc->setDescription("$id: $fc_description");
		} else {
			$fcc->setDescription("$id: Day Night Control");
		}
		$fcc->setDefault('*28'.$id);
		if ($code != '*28' && $code != '') {
			$fcc->setCode($code.$id);
		}
		if (!$enabled) {
			$fcc->setEnabled(false);
		}
		$fcc->update();
		unset($fcc);	
	}
}

?>
