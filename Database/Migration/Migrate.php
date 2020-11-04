<?php

namespace Gatherwork\Migration;


require_once __DIR__ . '/../config/app.php';
require config['path']['queryFunction'];
require_once config['path']['BluePrint'];
use Gatherwork\Database\Blueprint;

require config['path']['Connect'];
class Migrate

{
    public function tables()
    {
        $table = new Blueprint;
        return [
            0 => [
                $table->Integer('id', TRUE, null, true),
                $table->String('name'),
                $table->String('username'),
                $table->String('email'),
                $table->String('body'),
                $table->Timestamps()
            ],
            1 => [
                $table->Integer('id', TRUE, null, true),
                $table->String('title'),
                $table->String('body'),
                $table->Timestamps()
            ]
        ];
    }
}
$db = new Migrate;
/**
 * ### How to Query Table 
 * 
 * This Exam: Query('nameTable', $db->tables()[0] )
 * Detailing :
 *    - Query()  is special for assembling 
 *    - 'nameTable' is Name the Table for Create 
 *    - $db->tables() is Function up tables
 *    - [0] is Number Index Table in tables() function 
 * 
 */
Query('users', $db->tables()[0] );