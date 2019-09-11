<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore(){
		$configs = $this->getConfigs();
		$this->importTables($configs['tables']);
		if(!empty($configs['astdb'])) {
			$this->importAstDB($configs['astdb']);
		}
		if(!empty($configs['features'])) {
			$this->importFeatureCodes($configs['features']);
		}
		if(!empty($configs['settings'])) {
			$this->importAdvancedSettings($configs['settings']);
		}
	}

	public function processLegacy($pdo, $data, $tables, $unknownTables){
		$this->restoreLegacyDatabase($pdo);
		if(!empty($data['astdb']['DAYNIGHT'])) {
			$this->importAstDB([
				'DAYNIGHT' => $data['astdb']['DAYNIGHT']
			]);
		}
		$this->restoreLegacyFeatureCodes($pdo);
		$this->restoreLegacyAdvancedSettings($pdo);
	}
}
