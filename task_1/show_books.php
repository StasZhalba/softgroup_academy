<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20.01.2017
 * Time: 18:01
 */






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

show_books_table(get_books_file('file.txt'));

function show_books_table($books_array){
    echo '<table>';
    echo '<td>Автор</td>';
    echo '<td>Назва</td>';
    echo '<td>Кількість сторінок</td>';
    echo '<td>Рік видання</td>';
    echo '<td>Назва видаництва</td>';
    echo '<td>Дата поступлення</td>';
    foreach ($books_array as $book){
        echo '<tr>';
        foreach ($book as $key => $value){
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
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



function search_books($book_name, $array_books){
    if (isset($book_name) & isset($array_books) & !empty($book_name) & !empty($array_books)){
        foreach ($array_books as $book){
            if (strpos($book['name'], $book_name) != false){
                print_r($book);
                echo '<br>';
            }
        }
    }
}


?>

<a href="index.php">Головна сторінка</a>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

</style>