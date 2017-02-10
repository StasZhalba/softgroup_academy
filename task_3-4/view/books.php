<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.01.2017
 * Time: 11:07
 */



?>

<form method="post">
    Що шукаєте?
    <input type="text" id="search" name="search">
    <input type="submit"  value="Пошук"><br>
</form>

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
foreach ($books as $book) {
    echo '<tr>';
    echo '<td><a href="index.php?object=book&show=author&id='. $book['author_id'] . '">' .$book['author_name'] . ' ' . $book['author_surname'] .'</a></td>';
    echo '<td>'. $book['book_name'] .'</td>';
    echo '<td>'. $book['genre_name'] .'</td>';
    echo '<td>'. $book['book_pages'] .'</td>';
    echo '<td>'. $book['book_publisher_year'] .'</td>';
    echo '<td><a href="index.php?object=book&show=edition&id='. $book['edition_id'] . '">' . $book['edition_name'] .'</a></td>';
    echo '<td>'. $book['book_receipt'] .'</td>';
    echo '<td><a href="index.php?object=book&action=delete&id='. $book['book_id'] .'">Видалити</a></td>';
    echo '</tr>';
}

echo '</table>'
?>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

</style>
