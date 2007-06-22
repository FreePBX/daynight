<?php

$fcc = new featurecode('daynight', 'toggle-mode');
$fcc->delete();
unset($fcc);	

sql('DROP TABLE daynight');

?>
