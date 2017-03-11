<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 30.01.2017
 * Time: 13:23
 */

echo '<table>';
echo '<tr>
        <td><a href="/site/softgroup_academy/task_3-4/edition/all?sort=1">Name</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/edition/all?sort=2">Address</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/edition/all?sort=3">ZIP</a></td>
        <td><a href="/site/softgroup_academy/task_3-4/edition/all?sort=4">Contact person</a></td>
        <td></td>
      </tr>';
foreach ($items as $edition) {
    echo '<tr>';
    echo '<td>' . $edition->name . '</td>';
    echo '<td>'. $edition->address . '</td>';
    echo '<td>'. $edition->zip . '</td>';
    echo '<td>'. $edition->person->name . ' ' . $edition->person->surname . '</td>';
    echo '<td><a href="/site/softgroup_academy/task_3-4/edition/delete?id='. $edition->id .'">Delete</a></td>';
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
