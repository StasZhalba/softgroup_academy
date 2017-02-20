<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 14.02.2017
 * Time: 15:04
 */


class AuthorController{

    public function actionAll()
    {
        if (!isset($_GET['sort'])) {
            $authors = Author::authorsAll();
        } else {
            $sort = $_GET['sort'];
            if (is_numeric($sort)) {
                $authors = Author::authorsAll($sort);
            } else {
                $authors = Author::authorsAll();
            }
        }
        $view = new View();
        $view->items = $authors;
        $view->display('authors.php');
        echo '<a href="/site/softgroup_academy/task_3-4/author/add">Add new author</a><br>';

    }

    public function actionAdd()
    {
        $view = new View();
        $view->items = Country::findAll();
        $view->display('author_admin.php');
        echo '<a href="/site/softgroup_academy/task_3-4/author/all">All authors</a><br>';
        if (!empty($_POST)){
            $author = new Author();
            $author->surname = $_POST['surname'];
            $author->name = $_POST['name'];
            $author->yearOfBirth = intval($_POST['year_birth']);
            $author->death = intval($_POST['year_death']);
            $author->countryName = intval($_POST['country']);
            $author->save();
        }
    }

    public function actionDelete()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if (is_numeric($id)){
                $author = Author::findOneByPK($id);
                $author->delete();
                header("Location: /site/softgroup_academy/task_3-4/author/all");
            }
        }
    }
}