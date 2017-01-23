<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.01.2017
 * Time: 18:01
 */

require_once ('constants.php');

show_books_table(get_books_file(BOOKS_FILE_NAME));
echo '<br>Кількість різних авторів = ' . get_different_authors(get_books_file(BOOKS_FILE_NAME)) . '<br>';
echo '<br>Всі книги впорядковані за зростанням кількості сторінок у книжці<br>';
show_books_table(sort_books_pages(get_books_file(BOOKS_FILE_NAME)));





function get_books_file($file_name){
    $file_books = file($file_name);
    $books_arr = array();
    foreach ($file_books as $line){
        $arr = explode('|', $line);
        array_push($books_arr, array('author' => $arr[0], 'name' => $arr[1],
            'pages' => intval($arr[2] ), 'year' => intval($arr[3]), 'publisher_name' => $arr[4],
            'receipt' => $arr[5]));
    }
    return $books_arr;

}


function show_books_table($books_array){
    echo '<table>';
    echo '<td>Автор</td>';
    echo '<td>Назва</td>';
    echo '<td>Кількість сторінок</td>';
    echo '<td>Рік видання</td>';
    echo '<td>Назва видаництва</td>';
    echo '<td>Дата поступлення</td>';
    if (!empty($books_array)) {
        foreach ($books_array as $book) {
            echo '<tr>';
            foreach ($book as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
    }
    echo '<table>';

}

function sort_books_pages($books_arr){
    $data_pages = array();
    foreach($books_arr as $key=>$arr){
        $data_pages[$key]=$arr['pages'];
    }
    array_multisort($data_pages, SORT_NUMERIC, $books_arr);
    return $books_arr;
}

function get_different_authors($array_books){
    $data_author = array();
    foreach ($array_books as $key => $arr){
        $data_author[$key] = $arr['author'];
    }
    array_multisort($data_author, SORT_STRING, $array_books);
    $different_authors = 0;
    $author_name = '';
    foreach ($array_books as $book){
        if($book['author'] != $author_name){
            $author_name = $book['author'];
            $different_authors++;
        }
    }
    return $different_authors;
}



function get_search_books($search_text, $array_books){
    $books = array();
    if (isset($search_text) & isset($array_books) & !empty($search_text) & !empty($array_books)){
        foreach ($array_books as $book){
            $search_text_lower = mb_strtolower($search_text);
            if (strpos(mb_strtolower($book['name']), $search_text_lower) != false){
                array_push($books, $book);
            }
        }
    }
    return $books;
}


function search_books(){
    if (isset($_POST['submit'])){
        if (!empty($_POST['search'])){
            $search_text = $_POST['search'];
            echo 'Результати пошуку "' .  $search_text . '"<br>';
            show_books_table(get_search_books($search_text, get_books_file(BOOKS_FILE_NAME)));
        }
    }
}


?>

<br>

<form method="post">
    <label for="search">Поле для пошуку</label><br>
    <input type="search" id="search" name="search"><br>
    <input type="submit" name="submit" value="Знайти"><br>

</form>

<?php search_books(); ?>

<a href="index.php">Головна сторінка</a>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

</style>