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
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=1">Author</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=2">Book name</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=3">Genre</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=4">Pages</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=5">Publisher year</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=6">Edition</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/book/all?sort=7">Receipt</a></td>
        <td></td>
      </tr>';
foreach ($items as $book) {
    echo '<tr>';
    echo '<td><a href="/site/softgroup_academy/task_3-4/book/author?id='. $book->authorId . '">' .$book->authorName . ' ' . $book->authorSurname .'</a></td>';
    echo '<td>'. $book->name .'</td>';
    echo '<td>'. $book->genreName    .'</td>';
    echo '<td>'. $book->pages .'</td>';
    echo '<td>'. $book->publisherYear .'</td>';
    echo '<td><a href="/site/softgroup_academy/task_3-4/book/edition?id='. $book->editionId . '">' . $book->editionName .'</a></td>';
    echo '<td>'. $book->receipt .'</td>';
    echo '<td><a href="/site/softgroup_academy/task_3-4/book/delete?id='. $book->id .'">Delete</a></td>';
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
