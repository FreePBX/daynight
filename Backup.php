<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{

	public function runBackup($id,$transaction){
		$configs = [
			'tables' => $this->dumpTables(),
			'astdb' => $this->dumpAstDB('DAYNIGHT'),
			'features' => $this->dumpFeatureCodes(),
			'settings' => $this->dumpAdvancedSettings()
		];
		
		$this->addDependency('timeconditions');
		$this->addDependency('recordings');
		$this->addDependency('calendar');
		$this->addConfigs($configs);
	}
}
