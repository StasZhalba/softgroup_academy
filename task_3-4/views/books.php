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
        <td>Автор</td>
        <td>Назва книги</td>
        <td>Жанр</td>
        <td>Кількість сторінок</td>
        <td>Рік видвння</td>
        <td>Видавництво</td>
        <td>Дата поступлення</td>
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
    echo '<td><a href="/site/softgroup_academy/task_3-4/book/delete?id='. $book->id .'">Видалити</a></td>';
    echo '</tr>';
}

echo '</table>'
?>

<br>
<a href="/site/softgroup_academy/task_3-4/book/add">Add new book</a>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

</style>
