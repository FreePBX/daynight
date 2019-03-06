<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{
	public function runBackup($id,$transaction){
		$daynight = $this->FreePBX->Daynight;
		$configs = [
			'tables' => $this->dumpTables(),
			'astdb' => $this->FreePBX->astman->database_show('DAYNIGHT'),
			'features' => $this->dumpFeatureCodes(),
			'settings' => $this->dumpAdvancedSettings()
		];
		$this->addDependency('timeconditions');
		$this->addDependency('recordings');
		$this->addConfigs($configs);
	}
}