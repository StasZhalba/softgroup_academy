<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.01.2017
 * Time: 15:35
 */

function add_books(){
    if (isset($_POST['submit'])){
        $book_author = trim($_POST['author']);
        $book_name = trim($_POST['book_name']);
        $book_pages = trim($_POST['book_pages']);
        $book_year = $_POST['book_year'];
        $book_publisher_name = trim($_POST['book_publisher_name']);
        $book_receipt = $_POST['book_receipt'];

        if (strlen($book_author) <= 5){
            echo '<p>Імя автора має бути не менше 5 символів</p>';
        }
        elseif (empty($book_name)){
            echo '<p>Назва книги пусте!</p>';
        }
        elseif (!is_numeric($book_pages) & $book_pages < 1){
            echo '<p>Неправильно введено кількість сторінок, ведіть ще раз кількість сторінок!</p>';
        }
        elseif (empty(strlen($book_publisher_name))){
            echo '<p>Назва видавництва пусте. Ведіть видавництво!!!</p>';
        }
        elseif (empty($book_receipt)){
            echo '<p>Дата поступлення не задано!</p>';
        }
        else {
            if (!file_exists("file.txt")) {
                $myfile = fopen("file.txt", "w");
            }
            file_put_contents("file.txt", "$book_author | $book_name | $book_pages | $book_year | $book_publisher_name | $book_receipt\n", FILE_APPEND);
        }

    }
    else{
        $book_author = '';
        $book_name = '';
        $book_pages =  '';
        $book_year = '';
        $book_publisher_name = '';
        $book_receipt = '';

    }
}

add_books();


?>

<form method="post">
    <label for="author">Прізвище та і'мя автора книги: </label>
    <input type="text" id="author" name="author"><br>
    <label for="book_name">Назва книги: </label>
    <input type="text" id="book_name" name="book_name"><br>
    <label for="book_pages">Кількість сторінок: </label>
    <input type="number" id="book_pages" name="book_pages" min="1"><br>
    <label for="book_year">Рік видання: </label>
    <select id="book_year" name="book_year">
        <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            for(var i = 1900; i < year+1; i++){
                document.write('<option value="'+i+'">'+i+'</option>');
            }
        </script>
    </select>
    <br>
    <label for="book_publisher_name">Назва видавництва: </label>
    <input type="text" id="book_publisher_name" name="book_publisher_name"><br>
    <label for="book_receipt">Дата поступлення: </label>
    <input type="date" id="book_receipt" name="book_receipt" max="<?php echo date("Y-m-d"); ?>"><br>
    <input type="submit" name="submit" value="Добавити">
</form>

<a href="show_books.php">Вивести список книг</a><br>
<a href="index.php">Головна сторінка</a>


<style>
    form > label, input{
        margin: 5px;
    }
</style>

