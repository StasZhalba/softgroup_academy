
<form method="post">
    <label for="surname">Прізвище </label><br>
    <input type="text" id="surname" name="surname"><br>
    <label for="name">І'мя</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="year_birth">Рік народження</label><br>
    <select id="year_birth" name="year_birth">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            for(var i = 1800; i < year+1; i++){
                document.write('<option value="'+i+'">'+i+'</option>');
            }
        </script>
    </select>
    <br>
    <label for="year_death">Рік смерті(може бути пусто)</label><br>
    <select id="year_death" name="year_death">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            document.write('<option value=""></option>');
            for(var i = 1810; i < year+1; i++){
                document.write('<option value="'+i+'">'+i+'</option>');
            }
        </script>
    </select>
    <br>
    <label for="country">Країна</label><br>
    <select id="country" name="country">
        <?php
        foreach ($items as $country){
            echo '<option value="' . $country->id . '">'. $country->name . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Добавити">
    <br>
    <br>





