<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 05.02.2017
 * Time: 17:51
 */



class DB{

    protected $host, $user, $password, $dbName;

    /**
     * DB constructor.
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     */
    public function __construct($dbInfo)
    {
        $this->host = $dbInfo['host'];
        $this->user = $dbInfo['user'];
        $this->password = $dbInfo['password'];
        $this->dbName = $dbInfo['dbName'];
    }


    public function select($what, $from, $where = null, $order = null){
        $fetched = array();
        $sql = 'SELECT ' . $what . ' FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= 'ORDER BY ' . $order;



        $mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);

        $query = $mysql->query($sql);
        $mysql->close();
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