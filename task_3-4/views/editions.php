<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 30.01.2017
 * Time: 13:23
 */

echo '<table>';
echo '<tr>
        <td>Назва</td>
        <td>Адреса</td>
        <td>Контактна особа</td>
        <td></td>
      </tr>';
foreach ($items as $edition) {
    echo '<tr>';
    echo '<td>' . $edition->name . '</td>';
    echo '<td>'. $edition->address . ', ' . $edition->zip . '</td>';
    echo '<td>'. $edition->contactPerson .'</td>';
    echo '<td><a href="/site/softgroup_academy/task_3-4/edition/delete?id='. $edition->id .'">Видалити</a></td>';
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
