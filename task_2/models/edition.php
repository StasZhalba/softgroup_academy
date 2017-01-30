<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 20:09
 */


function add_edition($link, $name, $address, $ZIP, $contact_person){

    $address = mysqli_real_escape_string($link, trim($address));
    $name = mysqli_real_escape_string($link, trim($name));
    $ZIP = mysqli_real_escape_string($link, trim($ZIP));
    $contact_person = mysqli_real_escape_string($link, trim($contact_person));

    $result = mysqli_query($link, "INSERT INTO edition (edition_name, edition_address, edition_ZIP, contact_person) VALUES ('$name', '$address', '$ZIP', '$contact_person');");

    if (!$result){
        die(mysqli_error($link));
    }
}

function delete_edition($link, $id){
    if (is_numeric($id)) {
        mysqli_query("DELETE FROM edition WHERE id='$id';");
    }
}

function edition_all($link){
    if ($result = mysqli_query($link, 'SELECT * FROM edition;')){
        $editions = array();
        while ($row = mysqli_fetch_assoc($result)){
            $editions[] = $row;
        }
    }
    return $editions;
}

