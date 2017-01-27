<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 26.01.2017
 * Time: 15:56
 */
require_once('config.php');
require_once('validation.php');
require_once('data.php');


//add_author_to_db('Jjkdaskf', 'jdaskfj', 'fjasjhf', 232, 2012, 'adfas', '2016-02-12');
?>


<form method="post">
    <label for="surname">Прізвище </label><br>
    <input type="text" id="surname" name="surname"><br>
    <label for="name">І\'мя</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="year_birth">Рік народження</label><br>
    <select id="year_birth" name="year_birth">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            for(var i = 1800; i < year+1; i++){
                document.write('<option value="\'+i+\'">'+i+'</option>');
            }
        </script>
    </select>
    <br>
    <label for="year_death">Рік смерті(може бути пусто)</label><br>
    <select id="year_birth" name="year_birth">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            document.write(\'<option value=""></option>\');
            for(var i = 1810; i < year+1; i++){
                document.write(\'<option value="\'+i+\'">\'+i+\'</option>\');
            }
        </script>
    </select>
    <br>
    }





