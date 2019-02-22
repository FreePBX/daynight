<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore($jobid){
		$configs = $this->getConfigs();
		$this->importTables($configs['tables']);
		if(!empty($configs['astdb'])) {
			$this->importAstDB($configs['astdb']);
		}
	}

	public function processLegacy($pdo, $data, $tables, $unknownTables){
		$this->restoreLegacyDatabase($pdo);
		if(!empty($data['astdb']['DAYNIGHT'])) {
			$this->importAstDB([
				'DAYNIGHT' => $data['astdb']['DAYNIGHT']
			]);
		}
	}


}