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
foreach ($editions as $edition) {
    echo '<tr>';
    echo '<td>' . $edition['edition_name'] . '</td>';
    echo '<td>'. $edition['edition_address'] . ', ' . $edition['edition_ZIP'] . '</td>';
    echo '<td>'. $edition['contact_person'] .'</td>';
    echo '<td><a href="index.php?object=edition&action=delete&id='. $edition['edition_id'] .'">Видалити</a></td>';
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
