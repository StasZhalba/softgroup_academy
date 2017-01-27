<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 27.01.2017
 * Time: 20:09
 */


function add_edition($name, $country, $city, $home, $ZIP, $contact_person){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    if (mysqli_connect_errno()){
        printf("Неможливо підключитись до бази даних. Код помилки: %s\n", mysqli_connect_error());
        exit;
    }
    $country = mysqli_real_escape_string($mysqli, trim($country));
    $name = mysqli_real_escape_string($mysqli, trim($name));
    $city = mysqli_real_escape_string($mysqli, trim($city));
    $home = mysqli_real_escape_string($mysqli, trim($home));
    $ZIP = mysqli_real_escape_string($mysqli, trim($ZIP));
    $contact_person = mysqli_real_escape_string($mysqli, trim($contact_person));

    $mysqli->query("INSERT INTO edition (edition_name, edition_country, edition_city, edition_street, 
                          edition_home, edition_ZIP, contact_person) VALUES ('$name', '$country', '$city', '$home', '$ZIP', '$contact_person');");

    $mysqli->close();
}