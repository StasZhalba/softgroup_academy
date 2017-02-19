<?php

/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 19.02.2017
 * Time: 16:18
 */
class EditionController
{
    public function actionAll()
    {
        $editions = Edition::findAll();
        $view = new View();
        $view->items = $editions;
        $view->display('editions.php');
        echo '<a href="/site/softgroup_academy/task_3-4/edition/add">Add new edition</a><br>';
    }

    public function actionAdd()
    {
        $view = new View();
        $view->items = City::cityAll();
        $view->display('edition_admin.php');
        echo '<a href="/site/softgroup_academy/task_3-4/edition/all">All editions</a><br>';
        if (!empty($_POST)){
            $edition = new Edition();
            $edition->name = $_POST['name'];
            $edition->address = $_POST['country_city'] . ', ' . $_POST['street'] . ', ' . $_POST['home'];
            $edition->zip = $_POST['ZIP'];
            $edition->contactPerson = $_POST['contact_person'];
            var_dump($edition);

            $edition->save();
        }
    }

    public function actionDelete()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if (is_numeric($id)){
                $edition = Edition::findOneByPK($id);
                $edition->delete();
                header("Location: /site/softgroup_academy/task_3-4/edition/all");
            }
        }
    }
}