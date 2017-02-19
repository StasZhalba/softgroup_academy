<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 15.02.2017
 * Time: 15:17
 */
class View implements Iterator
{
    const PATH = __DIR__ . '/../views/';

    protected $data = [];


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function render($template)
    {
        foreach ($this->data as $key => $value){
            $$key = $value;
        }
        ob_start();
        include self::PATH . $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    public function display($template)
    {
        echo $this->render($template);
    }


    public function current()
    {
        $data = current($this->data);
        return $data;
    }


    public function next()
    {
        $data = next($this->data);
        return $data;
    }


    public function key()
    {
        $data = key($this->data);
        return $data;
    }


    public function valid()
    {
        $key = key($this->data);
        $data = ($key !== NULL && $key !== FALSE);
        return $data;
    }


    public function rewind()
    {
        reset($this->data);
    }
}