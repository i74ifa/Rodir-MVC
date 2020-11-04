<?php
namespace Gatherwork\Database;

use Gatherwork\Database\DataBase;


use PDO;
use PDOException;
require  __DIR__ .  "/../config/app.php";

require_once config['path']['methods'];

class DB implements DataBase
{
    public $sql;
    public $nameTable = 'users';
    protected $valuewhere;
    protected $valueselect;
    protected $valuelike;
    protected $valuelikeCol;
    protected $valuesINSERT;
    protected $valuesINSERTCol;
    public $CommaArray = [];

    // Check if SELECT or INSERT or Any

    private $INSERT_Ck;
    private $SELECT_Ck;
    private $InsertCol_Ck;
    /**
     * - Enter All Values in the table something else return error .
     * - if you want insert values not null only use INSERTCol() function.
     * - Enter Values like INSERT["'This'"] Coma Required.
     *
     *   @param mixed $values array required
     *   @return $this
     */
    public function INSERT($values)
    {
        $this->INSERT_Ck = TRUE;
        if (!is_array($values)) {
            echo '[ ' . $values . ' ] ' . self::notarray;
            exit();
        }
        $value = implode(', ', $values);
        $this->valuesINSERT = ' VALUES (' . $value . ')';
        return $this;
    }
    public function table($name)
    {
        $this->nameTable = $name;
        return $this;
    }
    /**
     * Getting array like
     *     - ['column', 'column2'] or ['*']
     * @param mixed $values array
     * 
     * @return $this
     */
    public function Select($values)
    {

        $this->SELECT_Ck = TRUE;

        // If $values not array return error;

        if (!is_array($values)) {
            echo '[ ' . $values . ' ] ' . self::notarray; //error
            exit();
        }

        $this->valueselect = $values;
        return $this;
    }

    /**
     * - Simple Query 
     * - Enter name Column with '=' and Value in Comma
     */
    public function Where($value)
    {
        $v =  self::where . $value;
        $this->valuewhere = $v;
        return $this;
    }
    /**
     * - Enter Two Array
     * ---- First value for Column name
     * ---- Second value to Value search
     * @param mixed $Column ;
     * @param mixed $valuelike;
     * 
     * @return $this
     */
    public function WhereLike($Column, $valuelike)
    {

        $value = self::where . $Column . ' ' . self::like . "'%$valuelike%'";

        $this->valuelike = $value;
        return $this;
    }

    /**
     * Insert Values to Columns NOT NULL
     * - getting two array 
     * - first array name Columns
     * *     second array values
     * 
     * @param mixed $Col   array
     * @param mixed $value array
     * 
     * @return $this 
     */
    public function INSERTCol($Col, $value)
    {
        $this->InsertCol_Ck = TRUE;
        $Columns = '( ' . implode(' ,', $Col) . ' )';
        $comma = CommaArray($value);
        if (is_array($comma)) // Not Array
            $values = implode(", ", $comma);
        $this->valuesINSERTCol =  $Columns . self::values . '( ' . $values . ' )';
        return $this;
    }
    /**
     * using for getting query from Database
     * 
     * @return Values_Database array
     */
    public function run()
    {
        // file Connect the database , Please Select the correct path  
        require config['path']['Connect'];
        // Check if Progress INSERT or SELECT or INColumn
        if ($this->INSERT_Ck) {
            $s = self::INSERT . $this->nameTable . $this->valuesINSERT;
            try {
                $sql = $con->query($s);
                $_SESSION['errors'] = '';
                return $sql;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } elseif ($this->SELECT_Ck) {
            try {
                $s = self::select . implode(self::co, $this->valueselect) .
                    self::from . $this->nameTable .
                    $this->valuewhere . $this->valuelike;
                $sql = $con->query($s);
                $_SESSION['errors'] = '';
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $_SESSION['errors'] = $e->getMessage();
            }
        } elseif ($this->InsertCol_Ck) {
            $s = self::INSERT . $this->nameTable . $this->valuesINSERTCol;
            try {
                $sql = $con->query($s);
                $_SESSION['errors'] = '';
                return $sql;
            } catch (PDOException $e) {
                $_SESSION['errors'] = $e->getMessage();
            }
        } else {
            echo self::notool;
            exit();
        }
    }
}