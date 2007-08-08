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

// Day / Night Mode Control
$fcc = new featurecode('daynight', 'toggle-mode');
$fcc->setDescription('Day/Night Control Toggle');
$fcc->setDefault('*28');
$fcc->update();
unset($fcc);	

?>
