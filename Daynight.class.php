<?php
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2015-2018 Sangoma Technologies.
namespace FreePBX\modules;
use BMO;
use FreePBX_Helpers;
use PDO;
use RuntimeException;
use UnexpectedValueException;
use BadMethodCallException;
class Daynight extends FreePBX_Helpers implements BMO {

    public function install() {}
    public function uninstall() {}
    public function doConfigPageInit($page) {

        $action = $this->getReq['action'];
        $request = [
            'action' => $action,
            'password' => $this->getReq('password'),
            'fc_description' => $this->getReq('fc_description'),
            'day_recording_id' => $this->getReq('day_recoerding_id'),
            'night_recording_id' => $this->getReq('night_recoerding_id'),
            'itemid' => $this->getReq('itemid'),
            'extdisplay' => $this->getReq('extdisplay'),
        ];

		switch ($action) {
			case "add":
			case "edit":
			case "edited":
				$this->edit($request,$request['itemid']);
				needreload();
			break;
			case "delete":
				$this->del($request['itemid'],true);
				needreload();
            break;
            default:
            break;
		}
    }

	public function getActionBar($request) {
        $buttons = [];
        if (empty($request['view']) || $request['view'] !== 'form') {
            return $buttons;
        }
        if($request['display'] === 'daynight'){
            if (isset($request['itemid']) || '' != $request['itemid']) {
                $buttons['delete'] = [
                    'name' => 'delete',
                    'id' => 'delete',
                    'value' => _('Delete'),
                ];
            }
            $buttons['reset'] = [
				'name' => 'reset',
                'id' => 'reset',
                'value' => _('Reset'),
            ];
            $buttons['submit'] = [
				'name' => 'submit',
                'id' => 'submit',
                'value' => _('Submit'),
            ];
        }
        return $buttons;
	}

	public function getRightNav($request) {
		if($request['view'] === 'form'){
        	return load_view(__DIR__."/views/bootnav.php",array());
		}
	}
    public function dumpConfigs(){
        $final = [];
        $states = [];
        $stmt = $this->FreePBX->Database->query('SELECT ext, dest, dmode FROM daynight');
        while ($row = $stmt->fetch()) {
            $final[] = $row;
            if(!isset($states[$row['ext']])){
                $states[$row['ext']] = $this->getState($row['ext']);
            }
        }
        return [
            'configs' => $final,
            'states' => $states,
        ];
    }

    public function loadConfigs($configs){
        $sql = "INSERT INTO daynight (ext, dmode, dest) VALUES (:id, :item, :value)";
        $sqldel = "DELETE FROM daynight WHERE ext = :ext AND dmode = :dmode LIMIT 1";
        $stmt = $this->FreePBX->prepare($sql);
        $stmtDelete = $this->FreePBX->prepare($sql);
        foreach ($configs['configs'] as $config){
            $stmtDelete->execute([
                ':ext' => $config['ext'],
                ':dmode' => $config['dmode']
            ]);
            $stmt->execute([
                ':id' => $config['ext'],
                ':item' => $config['dmode'],
                ':value' => $config['dest']
            ]);
        }
        foreach ($configs['states'] as $key => $state) {
            if($state === false){
                continue;
            }
            $this->delState($key);
            $this->addState($key,$state);
        }
    }

	public function listCallFlows() {
		$sql = "SELECT ext, dest FROM daynight WHERE dmode = 'fc_description' ORDER BY ext";
		$stmt = $this->FreePBX->Database->prepare($sql);
		$stmt->execute();
        $results = $stmt->fetchall(PDO::FETCH_ASSOC);
        /** Why? */
        $list = [];
		if(is_array($results)){
			foreach($results as $result){
				$list[] = $result;
			}
        }
        return $list;
	}

	public function ajaxRequest($command, &$setting) {
        return ($command === 'getJSON');
    }

    public function ajaxHandler(){
        if($_REQUEST['command'] === 'getJSON' && $_REQUEST['jdata'] === 'grid'){
            return array_values($this->listCallFlows());
        }
        return false;
    }

	public function tcAdd($data){
		if($this->FreePBX->Config->get('DAYNIGHTTCHOOK')){
			$sql = "DELETE FROM `daynight` WHERE `dmode` IN ('timeday', 'timenight') AND dest = :id";
			$stmt = $this->FreePBX->Database->prepare($sql);
			$stmt->execute(array(':id' => $data['id']));
			if (isset($data['post']['daynight_ref']) && $data['post']['daynight_ref'] != '') {
				$daynight_vals = explode(',',$data['post']['daynight_ref'],2);
				$sql = "INSERT INTO `daynight` (`ext`, `dmode`, `dest`) VALUES (:ext, :dmode, :dest)";
				$vars = array(':ext' => $daynight_vals[0], ':dmode' => $daynight_vals[1], ':dest' => $data['id'] );
				$stmt = $this->FreePBX->Database->prepare($sql);
				$stmt->execute($vars);
			}
        }
        return $this;
	}

	public function tcDelete($data){
		if($this->FreePBX->Config->get('DAYNIGHTTCHOOK')){
			$sql = "DELETE FROM `daynight` WHERE `dmode` IN ('timeday', 'timenight') AND dest = :id";
			$stmt = $this->FreePBX->Database->prepare($sql);
			$stmt->execute(array(':id' => $data));
        }
        return $this;
	}

	public function edit($post, $id=0){
		if($post['action'] != "add"){
			$this->del($id);
		}
		$day   = isset($post[$post['goto0'].'0'])?$post[$post['goto0'].'0']:'';
		$night = isset($post[$post['goto1'].'1'])?$post[$post['goto1'].'1']:'';
		$sql = "INSERT INTO daynight (ext, dmode, dest) VALUES (:id, :item, :value)";
		$stmt = $this->FreePBX->Database->prepare($sql);
		$returns = array();
		$returns['day'] = $stmt->execute(array(':id' => $id, ':item' => 'day', ':value' => $day));
		$returns['night'] = $stmt->execute(array(':id' => $id, ':item' => 'night', ':value' => $night));
		if (isset($post['password']) && trim($post['password'] != "")) {
			$returns['password'] = $stmt->execute(array(':id' => $id, ':item' => 'password', ':value' => $post['password']));
		}
		$fc_description = isset($post['fc_description']) ? trim($post['fc_description']) : "";
		$returns['fc_description'] = $stmt->execute(array(':id' => $id, ':item' => 'fc_description', ':value' => $fc_description));
		$day_recording_id = isset($post['day_recording_id']) ? trim($post['day_recording_id']) : "";
		$returns['day_recording_id'] = $stmt->execute(array(':id' => $id, ':item' => 'day_recording_id', ':value' => $day_recording_id));
		$night_recording_id = isset($post['night_recording_id']) ? trim($post['night_recording_id']) : "";
		$returns['night_recording_id'] = $stmt->execute(array(':id' => $id, ':item' => 'night_recording_id', ':value' => $night_recording_id));
		$this->delState($id);
		$this->addState($id, $post['state']);
		$fcc = new \featurecode('daynight', 'toggle-mode-'.$id);
		if ($fc_description) {
			$fcc->setDescription("$id: $fc_description");
		} else {
			$fcc->setDescription("$id: Call Flow Toggle Control");
		}
		$fcc->setDefault('*28'.$id);
		$fcc->setProvideDest();
		$fcc->update();
		unset($fcc);
		return $returns;
    }
    
	public function del($id, $all=false){
		$sql = "DELETE FROM daynight WHERE dmode IN ('day', 'night', 'password', 'fc_description','day_recording_id','night_recording_id') AND ext = :id";
		if($all){
			$sql = "DELETE FROM daynight WHERE ext = :id";
		}
		$stmt = $this->FreePBX->Database->prepare($sql);
		$stmt->execute(array(':id' => $id));
		if($all){
			$fcc = new \featurecode('daynight', 'toggle-mode-'.$id);
			$fcc->delete();
			unset($fcc);
			$this->delState($id);
		}
		return $this;
	}

	public function getState($id){
		if ($this->FreePBX->astman->connected()) {
			$mode = $this->FreePBX->astman->database_get("DAYNIGHT","C".$id);
			if ($mode != "DAY" && $mode != "NIGHT") {
				return false;
			} else {
				return $mode;
			}
        }
        throw new RuntimeException(_("Astersik manager is not running or we cannot access it."));
	}

	public function setState($id, $state){
        if (!$this->FreePBX->astman->connected()) {
            throw new RuntimeException(_("Astersik manager is not running or we cannot access it."));
        }
		if ($this->getState($id) === false) {
			 throw new RuntimeException(_("You must create the object before setting the state."));
        }
        if($state !== 'DAY' && $state !== 'NIGHT'){
            throw new \UnexpectedValueException(sprintf(_("Invalid State %s"),$state));
        }
        $this->FreePBX->astman->database_put("DAYNIGHT", "C" . $id, $state);
        $value_opt = ($state == 'DAY') ? 'NOT_INUSE' : 'INUSE';
        $this->FreePBX->astman->set_global("DEVICE_STATE(Custom:DAYNIGHT" . $id . ")", $value_opt);	
        return $this;
	}

	public function addState($id, $state="DAY"){
		$current_state = $this->getState($id);
		if ($current_state !== false) {
            throw new BadMethodCallException(sprintf(_('Object already exists and is in state: %s, you must delete it first'),$current_state));
        }
        if ($state !== 'DAY' && $state !== 'NIGHT') {
            throw new \UnexpectedValueException(sprintf(_("Invalid State %s"), $state));
        }
        if (!$this->FreePBX->astman->connected()) {
            throw new RuntimeException(_('Astersik manager is not running or we cannot access it.'));
        }

        $this->FreePBX->astman->database_put("DAYNIGHT","C".$id,$state);
        $value_opt = ($state  == 'DAY') ? 'NOT_INUSE' : 'INUSE';
        $this->FreePBX->astman->set_global("DEVICE_STATE(Custom:DAYNIGHT".$id.")", $value_opt);
        return $this;
    }
    
	public function delState($id){
        if (!$this->FreePBX->astman->connected()) {
            throw new RuntimeException(_('Astersik manager is not running or we cannot access it.'));
        }
        $this->FreePBX->astman->database_del("DAYNIGHT","C".$id);
        return $this;
	}
}
