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
      $sql = $sql . $array[$i] .  ', ';
    else if ($i == 1)
      $sql = $sql . $array[$i];
    else
      $sql = $sql .  ',' . $array[$i];
  }
  $sql = $sql . ')';

  try {
    $con->query($sql);
    echo shell_exec("echo \e[35m". 'table ' . $name_table . ' Created Successfully' . "\n");
  } catch (Exception $e) {
    echo shell_exec("echo \e[31m" ."'". $e->getMessage() . "'" . "\n");
  }
}
