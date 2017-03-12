<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.01.2017
 * Time: 11:07
 */



?>

<?php

echo '<table>';
echo '<tr>
        <td><a href=" ' . route('booksAll', array('sort' => 1)) . ' ">Author</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 2)) . ' ">Book name</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 3)) . ' ">Genre</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 4)) . ' ">Pages</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 5)) . ' ">Publisher year</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 6)) . ' ">Edition</a></td>
        <td><a href=" ' . route('booksAll', array('sort' => 7)) . ' ">Receipt</a></td>
        <td></td>
      </tr>';
foreach ($items as $book) {
    echo '<tr>';
    echo '<td><a href=" ' . route('booksWhere', array('where' => 'authorId', 'id' => $book->author->id)) . ' ">' .$book->author->name . ' ' . $book->author->surname .'</a></td>';
    echo '<td>'. $book->name .'</td>';
    echo '<td>'. $book->genre->name    .'</td>';
    echo '<td>'. $book->pages .'</td>';
    echo '<td>'. $book->publisherYear .'</td>';
    echo '<td><a href=" ' . route('booksWhere', array('where' => 'editionId', 'id' => $book->editionId)) . ' ">' . $book->edition->name .'</a></td>';
    echo '<td>'. $book->receipt .'</td>';
    echo '<td><a href="'. route('deleteBook', array('id' => $book->id)).'">Delete</a></td>';
    echo '</tr>';
}

echo '</table>'
?>

<br>
<a href="/site/softgroup_academy/task_3-4/book/add">Add new book</a>
<br>
<a href="/site/softgroup_academy/task_3-4/book/search">Search</a>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

</style>
