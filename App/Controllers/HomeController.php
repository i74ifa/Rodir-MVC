<?php

namespace Gatherwork\Controllers;

use Gatherwork\Database\DB;
// App\Controllers;

class HomeController
{

    public static function get()
    {

        return 'Hi HomeController';
        //
    }

    public function View()
    {


        require __DIR__ . '/../../Views/dataView.php';
    }

    public function ViewHuda()
    {


        return __DIR__ . '/../../Views/HudaView.php';
    }

    public function requestData()
    {
        $db = new DB;
        $search_by = $_POST['search_by'];
        $value = $_POST['value'];

        if (!$value)
            return;
        if ($_POST['type'] == 'Where') {
            $res = $db->table('users')->Select(['*'])->Where("$search_by = '$value'")->run();
        } else {

            $res = $db->table('users')->Select(['*'])->WhereLike($search_by, $value)->run();
        }
        return json_encode($res);
    }
}
