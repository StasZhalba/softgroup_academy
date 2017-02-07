<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 30.01.2017
 * Time: 11:10
 */


echo '<table>';
echo '<tr>
        <td>Прізвище</td>
        <td>Ім\'я</td>
        <td>Дата народження</td>
        <td>Дата смерті</td>
        <td>Країна</td>
        <td></td>
      </tr>';
foreach ($authors as $author) {
    echo '<tr>';
    echo '<td>' . $author['author_surname'] . '</td>';
    echo '<td>'. $author['author_name'] .'</td>';
    echo '<td>'. $author['author_year_of_birth'] .'</td>';
    echo '<td>'. $author['author_death'] .'</td>';
    echo '<td>'. $author['country_name'] .'</td>';
    echo '<td><a href="index.php?object=author&action=delete&id='. $author['author_id'] .'">Видалити</a></td>';
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
