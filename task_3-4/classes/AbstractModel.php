<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 16.02.2017
 * Time: 10:56
 */
abstract class AbstractModel
{
    static protected $table;
    static protected $tableID;

    protected $data = [];

    public function __set($name, $value)
    {
        $methodName = $this->methodSetNameClass($name);
        $this->data[$methodName] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    private function methodSetNameClass($name)
    {
        $tableNameLength = strlen(static::$table);
        if (substr($name, 0, $tableNameLength) == static::$table){
            return lcfirst(substr($name, $tableNameLength));
        }
        return $name;
    }


    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPK($id)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . static::$tableID . '=:id';
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql, ['id' => $id])[0];
    }

    public static function findOneByColumn($column, $value)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value])[0];
        if (empty($res)){
            throw new ModelException('Ничего не найдено в БД');
        }

        return $res;
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $modCols = [];
        $data = [];
        foreach ($cols as $col)
        {
            $modCol = static::$table . ucfirst($col);
            $modCols[] = $modCol;
            $data[':' . $col] = $this->data[$col];
        }

        $sql = '
          INSERT INTO ' . static::$table . '
          (' . implode(', ', $modCols) . ') 
          VALUES 
          (' . implode(', ', array_keys($data)) . ') 
         ';

        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertID();

    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v)
        {
            $data[':' . $k] = $v;
            if(static::$tableID == $k)
            {
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }

        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE ' . static::$tableID . '=:' . static::$tableID
        ;


        $db = new DB();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if (!isset($this->id)){
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . '
            WHERE ' . static::$tableID . '=:id';
        $db = new DB();
        $db->execute($sql, ['id' => $this->data['id']]);
    }

}