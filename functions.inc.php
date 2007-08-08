<?php
 /* $Id: functions.inc.php 4024 2007-06-09 03:09:16Z p_lindheimer $ */

// Class To Create, Access and Change DAYNIGHT objects in the dialplan
//
class dayNightObject {

	var $id;

	// contstructor
	function dayNightObject($item) {
		$this->id = $item;
	}
		
	function getState() {
		global $astman;

		if ($astman != null) {
			$mode = $astman->database_get("DAYNIGHT","C".$this->id);
			if ($mode != "DAY" && $mode != "NIGHT") {
				// TODO: should this return an error?
				return false;
			} else {
				return $mode;
			}
		} else {
			die_freepbx("No open connection to asterisk manager, can not access object.");
		}
	}

	function setState($state) {
		global $astman;

		if ($this->getState() === false) {
			die_freepbx("You must create the object before setting the state.");
			return false;
		} else {
			switch ($state) {
				case "DAY":
				case "NIGHT":
					if ($astman != null) {
						$astman->database_put("DAYNIGHT","C".$this->id,$state);
					} else {
						die_freepbx("No open connection to asterisk manager, can not access object.");
					}
					break;
				default:
					die_freepbx("Invalid state: $state");
					break;
			}
		}
	}

	function create($state="DAY") {
		global $astman;

		$current_state = $this->getState();
		if ($current_state !== false) {
			die_freepbx("Object already exists and is in state: $current_state, you must delete it first");
			return false;
		} else {
			switch ($state) {
				case "DAY":
				case "NIGHT":
					if ($astman != null) {
						$astman->database_put("DAYNIGHT","C".$this->id,$state);
					} else {
						die_freepbx("No open connection to asterisk manager, can not access object.");
					}
					break;
				default:
					die_freepbx("Invalid state: $state");
					break;
			}
		}
	}

	function del() {
		global $astman;

		if ($astman != null) {
			$astman->database_del("DAYNIGHT","C".$this->id);
		} else {
			die_freepbx("No open connection to asterisk manager, can not access object.");
		}
	}
}

// The destinations this module provides
// returns a associative arrays with keys 'destination' and 'description'
function daynight_destinations() {

	$list = daynight_list();
	foreach ($list as $item) {
		$dests = daynight_get_obj($item['ext']);
		if (!isset($dests['day']) || !isset($dests['night'])) {
			continue;
		}
		$description = $item['dest'] != ""?$item['dest']:"Day/Night Switch";
		$description = "(".$item['ext'].") ".$description;
		$extens[] = array('destination' => 'app-daynight,'.$item['ext'].',1', 'description' => $description);
	}

	// return an associative array with destination and description
	if (isset($extens)) 
		return $extens;
	else
		return null;
}

function daynight_get_config($engine) {
	global $ext;

	switch($engine) {
		case "asterisk":

			$id = "app-daynight"; // The context to be included
			$ext->addInclude('from-internal-additional', $id); // Add the include from from-internal

			$list = daynight_list();

			foreach ($list as $item) {
				$dests = daynight_get_obj($item['ext']);
				$ext->add($id, $item['ext'], '', new ext_gotoif('$["${DB(DAYNIGHT/C${EXTEN}}" = "NIGHT"]',$dests['night'],$dests['day']));
			}

			daynight_toggle();

			break;
	}
}

function daynight_toggle() {
	global $ext;

	$fcc = new featurecode('daynight', 'toggle-mode');
	$c = $fcc->getCodeActive();
	unset($fcc);

	if (!empty($c)) {
		$id = "app-daynight-toggle"; // The context to be included

		$ext->addInclude('from-internal-additional', $id); // Add the include from from-internal

		$list = daynight_list();
		$passwords = daynight_passwords();
		foreach ($list as $item) {
			$index = $item['ext'];
			$ext->add($id, $c.$index, '', new ext_answer(''));
			$ext->add($id, $c.$index, '', new ext_wait('1'));

			if (isset($passwords[$index]) && trim($passwords[$index]) != "" && ctype_digit(trim($passwords[$index]))) {
				$ext->add($id, $c.$index, '', new ext_authenticate($passwords[$index]));
			}
			$ext->add($id, $c.$index, '', new ext_setvar('INDEX', $index));	
			$ext->add($id, $c.$index, '', new ext_goto($id.',s,1'));
		}

		$c='s';
		$ext->add($id, $c, '', new ext_setvar('DAYNIGHTMODE', '${DB(DAYNIGHT/C${INDEX}}'));	
		$ext->add($id, $c, '', new ext_gotoif('$["${DAYNIGHTMODE}" = "NIGHT"]', 'day', 'night'));

		$ext->add($id, $c, 'day', new ext_setvar('DB(DAYNIGHT/C${INDEX})', 'DAY'));	
		$ext->add($id, $c, '', new ext_playback('beep&silence/1&day&reception&digits/${INDEX}&enabled'));
		$ext->add($id, $c, '', new ext_hangup(''));

		$ext->add($id, $c, 'night', new ext_setvar('DB(DAYNIGHT/C${INDEX})', 'NIGHT'));	
		$ext->add($id, $c, '', new ext_playback('beep&silence/1&beep&silence/1&day&reception&digits/${INDEX}&disabled'));
		$ext->add($id, $c, '', new ext_hangup(''));
	}
}

function daynight_get_avail() {
	global $db;

	$sql = "SELECT ext FROM daynight ORDER BY ext";
	$results = $db->getCol($sql);
	if(DB::IsError($results)) {
		$results = array();
	}

	for ($i=0;$i<=9;$i++) {
		if (!in_array($i,$results)) {
			$list[]=$i;
		}
	}
	return $list;
}

//get the existing daynight codes
function daynight_list() {
	$results = sql("SELECT ext, dest FROM daynight WHERE dmode = 'fc_description' ORDER BY ext","getAll",DB_FETCHMODE_ASSOC);
	if(is_array($results)){
		foreach($results as $result){
			$list[] = $result;
		}
	}
	if (isset($list)) {
		return $list;
	} else { 
		return array();
	}
}

//get the existing password codes
function daynight_passwords() {
	$results = sql("SELECT ext, dest FROM daynight WHERE dmode = 'password'","getAll",DB_FETCHMODE_ASSOC);
	if(is_array($results)){
		foreach($results as $result){
			$list[$result['ext']] = $result['dest'];
		}
	}
	if (isset($list)) {
		return $list;
	} else { 
		return array();
	}
}

function daynight_edit($post, $id=0) {

	// TODO: Probably have separate add and edit (and change in page.daynight.php also)
	//       Need to set the day/night mode in the system if new

	// Delete all the old dests
	sql("DELETE FROM daynight WHERE dmode IN ('day', 'night', 'password', 'fc_description') AND ext = '$id'");

	$day   = isset($post[$post['goto0'].'0'])?$post[$post['goto0'].'0']:'';
	$night = isset($post[$post['goto1'].'1'])?$post[$post['goto1'].'1']:'';

	sql("INSERT INTO daynight (ext, dmode, dest) VALUES ('$id', 'day', '$day')");
	sql("INSERT INTO daynight (ext, dmode, dest) VALUES ('$id', 'night', '$night')");

	if (isset($post['password']) && trim($post['password'] != "")) {
		$password = trim($post['password']);
		sql("INSERT INTO daynight (ext, dmode, dest) VALUES ('$id', 'password', '$password')");
	}
	if (isset($post['fc_description']) && trim($post['fc_description'] != "")) {
		$fc_description = trim($post['fc_description']);
		sql("INSERT INTO daynight (ext, dmode, dest) VALUES ('$id', 'fc_description', '$fc_description')");
	}

	$dn = new dayNightObject($id);
	$dn->del();
	$dn->create($post['state']);

	needreload();
}

function daynight_del($id){

	// TODO: delete ASTDB entry when deleting the mode
	//
	$results = sql("DELETE FROM daynight WHERE ext = \"$id\"","query");
}

function daynight_get_obj($id=0) {
	global $db;

	$sql = "SELECT dmode, dest FROM daynight WHERE dmode IN ('day', 'night', 'password', 'fc_description') AND ext = '$id' ORDER BY dmode";
	$res = $db->getAll($sql, DB_FETCHMODE_ASSOC);
	if(DB::IsError($res)) {
		return null;
	}
		foreach($res as $pair) {
			$dmodes[$pair['dmode']] = $pair['dest'];
		}
		$dn = new dayNightObject($id);
		$dmodes['state'] = $dn->getState();

		return $dmodes;
}
?>
