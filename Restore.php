<?php
namespace FreePBX\modules\Daynight;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
    $daynight = $this->FreePBX->Daynight;
    $configs = $this->getConfigs();
    $daynight->loadConfigs($configs);
  }

  public function processLegacy($pdo, $data, $tables, $unknownTables, $tmpfiledir){
    $tables = array_flip($tables + $unknownTables);
    if (!isset($tables['callback'])) {
      return $this;
    }
    $daynight = $this->FreePBX->Daynight;
    $daynight->setDatabase($pdo);
    $configs = $daynight->dumpConfigs();
    $daynight->resetDatabase();
    $daynight->loadConfigs(reset($configs));

    return $this;
  }

  public function dumpConfigs($pdo)
{
    $final = [];
    $states = [];
    $stmt = $pdo->query('SELECT ext, dest, dmode FROM daynight');
    while ($row = $stmt->fetch()) {
      $final[] = $row;
      if (!isset($states[$row['ext']])) {
        $states[$row['ext']] = $this->getState($row['ext']);
      }
    }
    return [
      'configs' => $final,
      'states' => $states,
    ];
  }
}