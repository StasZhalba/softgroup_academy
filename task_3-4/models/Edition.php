<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 10.02.2017
 * Time: 9:53
 * @property $id
 * @property $name
 * @property $address
 * @property $zip
 * @property $contactPerson
 */

class Edition extends AbstractModel {
    protected static $table = 'edition';
    protected static $tableID = 'editionId';

    public static function editionsAll($sort = 0){

        $db = new DB();
        $db->setClassName(get_called_class());
        $query ='SELECT * FROM edition ';

        switch ($sort){
            case 1:
                $query .= "ORDER BY edition.editionName DESC";
                break;
            case 2:
                $query .= "ORDER BY edition.editionAddress DESC";
                break;
            case 3:
                $query .= "ORDER BY edition.editionZip DESC";
                break;
            case 4:
                $query .= "ORDER BY edition.editionContactPerson DESC";
                break;
            default:
        }

        return $db->query($query);
    }
}