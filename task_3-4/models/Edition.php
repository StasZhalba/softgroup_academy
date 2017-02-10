<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 10.02.2017
 * Time: 9:53
 */

class Edition extends DB{
    protected $name;
    protected $address;
    protected $ZIP;
    protected $contactPerson;

    public function __construct($editionInfo)
    {
        $this->name = $editionInfo['name'];
        $this->address = $editionInfo['address'];
        $this->ZIP = $editionInfo['ZIP'];
        $this->contactPerson = $editionInfo['contactPerson'];
    }


}