<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{
  
	public function parse_daynight(){
		$dn_data = $this->FreePBX->astman->database_show('DAYNIGHT');
		$result	= array();
		foreach($dn_data as $key => $dn){
			$res = explode('/',$key);
			$family = $res[1];
			$k 		= $res[2];
			$value	= $dn;
			$result[] = array($family => array($k => $value));

		}
		return $result;
	}
  
	public function runBackup($id,$transaction){
		$configs = [
			'tables' => $this->dumpTables(),
			'astdb' => $this->parse_daynight(),
			'features' => $this->dumpFeatureCodes(),
			'settings' => $this->dumpAdvancedSettings()
		];
		
		$this->addDependency('timeconditions');
		$this->addDependency('recordings');
		$this->addDependency('calendar');
		$this->addConfigs($configs);
	}
}
