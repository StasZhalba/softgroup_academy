
<form method="post">
    <label for="surname">Surname </label><br>
    <input type="text" id="surname" name="surname"><br>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="year_birth">Date of birth</label><br>
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
    <label for="year_death">Date of death(null)</label><br>
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
    <label for="country">Country</label><br>
    <select id="country" name="country">
        <?php
        foreach ($items as $country){
            echo '<option value="' . $country->id . '">'. $country->name . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Save">
    <br>
    <br>





