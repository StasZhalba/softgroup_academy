<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 05.02.2017
 * Time: 17:51
 */



class DB{

    protected $host;

    public function select($link, $what, $from, $where = null, $order = null){
        $fetched = array();
        $sql = 'SELECT ' . $what . ' FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= 'ORDER BY ' . $order;

        $query = mysqli_query($link, $sql);
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




}