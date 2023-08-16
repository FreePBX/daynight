<?php
namespace FreePBX\modules\Daynight;

use FreePBX\modules\Backup as Base;

class Backup extends Base\BackupBase {

	public function parse_daynight() {
		$dn_data = $this->FreePBX->astman->database_show('DAYNIGHT');
		$result  = [];
		foreach ($dn_data as $key => $dn) {
			$res      = explode('/', (string) $key);
			$family   = $res[1];
			$k        = $res[2];
			$value    = $dn;
			$result[] = [ $family => [ $k => $value ] ];

		}
		return $result;
	}

	public function runBackup($id, $transaction) {
		$configs = [
			'tables'   => $this->dumpTables(),
			'astdb'    => $this->parse_daynight(),
			'features' => $this->dumpFeatureCodes(),
			'settings' => $this->dumpAdvancedSettings()
		];

		$this->addDependency('timeconditions');
		$this->addDependency('recordings');
		$this->addDependency('calendar');
		$this->addConfigs($configs);
	}
}