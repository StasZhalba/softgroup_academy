<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 30.01.2017
 * Time: 11:10
 */


echo '<table>';
echo '<tr>
        <td><a href=" ' . route('authorAllSort', array('sort' => '1')) . ' ">Surname</a></td>
        <td><a href=" ' . route('authorAllSort', array('sort' => '2')) . ' ">Name</a></td>
        <td><a href=" ' . route('authorAllSort', array('sort' => '3')) . ' ">Date of birth</a></td>
        <td><a href=" ' . route('authorAllSort', array('sort' => '4')) . ' ">Date of death</a></td>
        <td><a href=" ' . route('authorAllSort', array('sort' => '5')) . ' ">Country</a></td>
        <td></td>
      </tr>';
foreach ($items as $author) {
    echo '<tr>';
    echo '<td>' . $author->surname . '</td>';
    echo '<td>'. $author->name .'</td>';
    echo '<td>'. $author->yearOfBirth .'</td>';
    echo '<td>'. $author->yearOfDeath .'</td>';
    echo '<td>'. $author->country->name .'</td>';
    echo '<td><a href="'. route('deleteAuthor', array('id' => $author->id)).'">Delete</a></td>';
    echo '</tr>';
}

echo '</table><br>'
?>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

</style>
