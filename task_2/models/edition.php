<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 20:09
 */


function add_edition($link, $name, $country, $city, $home, $ZIP, $contact_person){

    $country = mysqli_real_escape_string($link, trim($country));
    $name = mysqli_real_escape_string($link, trim($name));
    $city = mysqli_real_escape_string($link, trim($city));
    $home = mysqli_real_escape_string($link, trim($home));
    $ZIP = mysqli_real_escape_string($link, trim($ZIP));
    $contact_person = mysqli_real_escape_string($link, trim($contact_person));

    $result = mysqli_query($link, "INSERT INTO edition (edition_name, edition_country, edition_city, edition_street, 
                          edition_home, edition_ZIP, contact_person) VALUES ('$name', '$country', '$city', '$home', '$ZIP', '$contact_person');");

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

