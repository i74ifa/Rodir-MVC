<?php

namespace Gatherwork\Database;


use Gatherwork\Database\DB;


class Controller
{


    public function Get()
    {
        $DB = new DB;
        if (isset($_GET)) {
            if (isset($_GET['username'])) {
                $value = $_GET['username'];
                $search_by = $_GET['search_by'];
                if ($_GET['type'] == 'WhereLike') {
                    $res = $DB->table('users')->Select(['*'])->WhereLike($search_by, $value)->run();
                } else {
                    $res = $DB->table('users')->Select(['*'])->Where("$search_by = '$value'")->run();
                }
                print_r($_GET);
                $json = json_encode($res);
                return $json;
            }
        }
    }
}
