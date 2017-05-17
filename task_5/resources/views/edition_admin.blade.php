<form method="post" action="<?php route('editionAdd')?>">
    {{ csrf_field() }}
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="country_city">Country, city</label><br>
    <select id="country_city" name="country_city">
        <?php
        foreach ($items as $city){
            echo '<option value="' . $city->id . '">'. $city->name . ', ' . $city->country->name . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="street">Street</label><br>
    <input type="text" id="street" name="street"><br>
    <label for="home">Home</label><br>
    <input type="text" id="home" name="home"><br>
    <label for="ZIP">ZIP Postal</label><br>
    <input type="number" id="ZIP" name="ZIP"><br>
    <label for="contact_person">Contact person</label><br>
    <input type="text" id="contact_person" name="contact_person"><br><br>
    <input type="submit" name="submit" value="Save">
</form>