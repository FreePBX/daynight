<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
    $daynight = $this->FreePBX->Daynight;
    $configs = $this->getConfigs();
    $daynight->configLoad($configs);
  }
}