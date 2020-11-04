<?php
require_once config['path']['Migrate'];

require_once config['path']['Connect'];

/**
 *
 * - add this if you want create the table from the database\migrate
 * - and disable like this comment or delete the code ;
 * 
 */
function Query($name_table, $array)
{
  require config['path']['Connect'];
  $sql = (isset($sql) ? $sql . "CRETE TABLE $name_table (" : "CREATE TABLE $name_table (");
  for ($i = 0; $i < count($array); $i++) {
    if ($i == 0)
      $sql = $sql;
    else if ($i == 1)
      $sql = $sql . $array[$i];
    else
      $sql = $sql .  ',' . $array[$i];
  }
  $sql = $sql . ')';

  try {
    $con->query($sql);
    echo "table $name_table Created \n";
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
