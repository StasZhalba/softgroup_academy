<?php
require_once ('../models/author.php');
?>

<form method="post">
    <label for="authors">Автор</label><br>
    <select name="authors" id="authors">
        <?php
        foreach (authors_all() as $author){
            echo '<option value="'. $author['author_id'] .'">'. $author['author_surname'] . ' ' . $author['author_name'] .'</option>';
        }
        ?>
        <option>hjkjhk</option>
    </select><br>
    <label for="book_name">Назва книги</label><br>
    <input type="text" id="book_name" name="book_name"><br>
    <label for="genre">Жанр</label><br>
    <select name="genre" id="genre">
        <option value=""></option>
    </select>
    <br>
    <label for="pages">Кількість сторінок</label><br>
    <input type="number" id="pages" name="pages" min="1"><br>
    <label for="publisher_year">Рік видання</label><br>
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
    <label for="edition">Видавництво</label><br>
    <select id="edition" name="edition">
        <option value=""></option>
    </select>
    <br>
    <label for="book_receipt">Дата поступлення: </label>
    <input type="date" id="book_receipt" name="book_receipt" max="<?php echo date("Y-m-d"); ?>"><br>
</form>
