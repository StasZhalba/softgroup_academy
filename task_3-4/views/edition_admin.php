<form method="post">
    <label for="name">Назва</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="country_city">Країна, місто</label><br>
    <select id="country_city" name="country_city">
        <?php
        foreach ($items as $city){
            echo '<option value="' . $city->id . '">'. $city->name . ', ' . $city->countryName . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="street">Вулиця</label><br>
    <input type="text" id="street" name="street"><br>
    <label for="home">Дім</label><br>
    <input type="text" id="home" name="home"><br>
    <label for="ZIP">Поштовий індекс</label><br>
    <input type="number" id="ZIP" name="ZIP"><br>
    <label for="contact_person">Контактна особа</label><br>
    <input type="text" id="contact_person" name="contact_person"><br><br>
    <input type="submit" name="submit" value="Добавити">
</form>