<?php
namespace Gatherwork\Database;


interface DataBase {
    public function WhereLike($Column, $name);
    public function Where($value);
    public function INSERTCol($Col, $values);

    // public function INSERT($value);
    const notarray = "Sorry This Value Not Array";
    const co = ',  '; 
    const from = ' FROM ';
    const where = ' WHERE ';
    const select = 'SELECT ';
    const like = ' LIKE ';
    const INSERT = "INSERT INTO ";
    const values = " VALUES ";
    const notool = "Please Select any getting tool like Select or INSERT before get()";


}

interface faceINSERT {

    public static function table($name);
    public function INSERT($value);
    public function INSERTCol($value);
    // public function INSERT($value);
    const notarray = "Sorry This Value Not Array";
    const INSERT = "INSERT INTO ";


}