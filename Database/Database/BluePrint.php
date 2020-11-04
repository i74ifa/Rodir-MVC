<?php

namespace Gatherwork\Database;

class Blueprint
{
    /**
     * - Data type: `INT`
     * - From : `-2,147,483,648`
     * - TO  :   `2,147,483,648`
     * - True Or False if you enable any Features 
     * @param mixed $name name Column
     * @param bool $Auto_increment True or false
     * @param bool $Unique true or false
     * @param bool $primary_key true or false
     */
    public function Integer($name, $Auto_increment = false, $Unique = false, $primary_key = false)
    {
        $sql = "`$name` INT" . ($Auto_increment ? ' AUTO_INCREMENT' : null) . ($Unique ? ' UNIQUE' : null)
            . ($primary_key ? ' PRIMARY KEY' : NULL) . ' NOT NULL ';
        return $sql;
    }
    /**
     * - Data type: `TEXT`
     * - TO  :  non-Unicode data with a maximum`2,147,483,647`
     *     /**
     * - Data type: `INT`
     * - From : `-2,147,483,648`
     * - TO  :   `2,147,483,648`
     * - True Or False if you enable any Features 
     * @param mixed $name name Column
     * @param bool $Unique true or false
     * @param bool $primary_key true or false
     */
    public function String($name, $Unique = false, $primary_key = false)
    {
        $sql = "`$name` TEXT" .  ($Unique ? ' UNIQUE' : null) . ($primary_key ? ' PRIMARY KEY ' : null) . ' NOT NULL ';
        return $sql;
    }
    /**
     * - Data type: `Varchar`
     * Maximum length of `2E + 31` characters, Variable-length non-Unicode data (SQL Server 2005 only).
     * @param mixed $name name Column
     * @param int $Unique Number of Digit
     * @param bool $primary_key true or false
     */
    public function Varchar($name, $count, $Unique = null)
    {
        $sql = "`$name` VARCHAR($count)" . ($Unique ? ' UNIQUE' : null) . ' NOT NULL ';
        return $sql;
    }
    /**
     * Create Two Columns [created_at & updated_at]
     * - if You need Custom name Columns Enter Value to Like: 
     *    -- $names = 'nameOne, nameTwo'
     */
    public function Timestamps($names = false)
    {
        $One = "created_at";
        $Two = "updated_at";
        if ($names) {
            $names = explode(',', $names);
            $One = $names[0];
            $Two = $names[1];
        }
        $sql = "$One TIMESTAMP, $Two TIMESTAMP";
        return $sql;
    }
    /**
     * if you want Drop Table 
     *  - 
     */
    public function DropTables($name)
    {
        $sql = 'DROP TABLE ' . $name;
        return $sql;
    }
    /**
     * - Data type: `INT`
     * - From : `-2,147,483,648`
     * - TO  :   `2,147,483,648`
     */
    public function BigInteger($name, $Unique = null, $primary_key = null)
    {
        $sql = "";
    }
}
