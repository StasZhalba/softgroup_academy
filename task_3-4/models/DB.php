<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 05.02.2017
 * Time: 17:51
 */
include '../config/DBConfig.php';


class DB extends DBConfig {

    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passCode;

    function DB(){
        $dbPara = new DBConfig();
        $this->databaseName = $dbPara->dbName;
        $this->hostName = $dbPara->serverName;
        $this->userName = $dbPara->userName;
        $this->passCode = $dbPara->passCode;
    }

    public function DBConnection(){
        $mysql = new mysqli($this->hostName, $this->userName, $this->passCode, $this->databaseName);
        return $mysql;
    }


    public function select($what, $from, $where = null, $order = null){
        $fetched = array();
        $sql = 'SELECT ' . $what . ' FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= 'ORDER BY ' . $order;

        $db = $this->DBConnection();
        $query = $db->query($sql);
        $db->close();

        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $fetched[] = $row;
            }
            return $fetched;
        }
        else {
            return false;
        }


    }

    public function delete($table, $where, $value){
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where . ' = ' . $value;

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        $result = $mysql->query($sql);

        if (!$result)
            die($mysql->errno);

        $mysql->close();
    }

    public function update($table, $where, $value_for_where, $set, $value_for_set){
        $sql = 'UPDATE ' . $table . ' SET ' . $set . ' = ' . $value_for_set . ' WHERE ' . $where . ' = ' .
            $value_for_where;

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        $result = $mysql->query($sql);

        if (!$result)
            die($mysql->errno);

        $mysql->close();
    }

    public function insert($data_array, $table){
        $sql = 'INSERT INTO ' . $table ;
        $sql_item = ' (';
        $sql_item_value = ' (';

        $num_row = count($data_array);
        $array_num = 1;

        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        foreach ($data_array as $key => $value){
            $key = $mysql->real_escape_string(trim($key));
            $value = $mysql->real_escape_string(trim($value));

            if ($num_row != $array_num) {
                $sql_item .= $key . ', ';
                $sql_item_value .= $value . ', ';
            } else {
                $sql_item .= $key . ') ';
                $sql_item_value .= $value . ') ';
            }
            $array_num++;
        }

        $sql .= $sql_item . ' VALUES ' . $sql_item_value ;


        $result = $mysql->query($sql);

        if (!$result)
            die($mysql->errno);

        $mysql->close();
    }




}