<form method="post">
    <label for="authors">Author</label><br>
    <select name="authors" id="authors">
        <?php
        foreach ($authors as $author){
            echo '<option value="'. $author->id.'">'. $author->surname . ' ' . $author->name .'</option>';
        }
        ?>
    </select><br>
    <label for="book_name">Book name</label><br>
    <input type="text" id="book_name" name="book_name"><br>
    <label for="genre">Genre</label><br>
    <select name="genre" id="genre">
        <?php
        foreach ($genres as $genre){
            echo '<option value="'. $genre->id .'">' . $genre->name . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="pages">Pages</label><br>
    <input type="number" id="pages" name="pages" min="1"><br>
    <label for="publisher_year">Publisher year</label><br>
    <select name="publisher_year" id="publisher_year">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            for(var i = 1900; i < year+1; i++){
                document.write('<option value="'+i+'">'+i+'</option>');
            }
        </script>
    </select>
    <br>
    <label for="edition">Edition</label><br>
    <select id="edition" name="edition">
        <?php
        foreach ($editions as $edition){
            echo '<option value="'. $edition->id .'">' . $edition->name . '</option>';
        }
        ?>
    </select>
    <br>
    <label for="book_receipt">Receipt: </label>
    <br>
    <input type="date" id="book_receipt" name="book_receipt" min="1800-01-01" max="<?php echo date("Y-m-d"); ?>"><br>
    <input type="submit" name="submit" value="Save">
</form>
