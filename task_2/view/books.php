<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 28.01.2017
 * Time: 11:07
 */


function generate_sort_links($user_search, $sort){
    $sort_links = '';

    switch ($sort){
        case 1:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=2">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
            break;
        case 3:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=4">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">Date Posted</a></td>';
            break;
        case 5:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=6">Date Posted</a></td>';
            break;
        default:
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=1">Job Title</a></td><td>Description</td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=3">State</a></td>';
            $sort_links .= '<td><a href = "' . $_SERVER['PHP_SELF'] . '?usersearch=' . $user_search . '&sort=5">Date Posted</a></td>';
    }
    return $sort_links;
}

echo '<table>';
echo '<tr>
        <td>Автор</td>
        <td>Назва книги</td>
        <td>Жанр</td>
        <td>Кількість сторінок</td>
        <td>Рік видвння</td>
        <td>Видавництво</td>
        <td>Дата поступлення</td>
        <td></td>
      </tr>';
foreach ($books as $book) {
    echo '<tr>';
    echo '<td><a href="index.php?object=book&show=author&id='. $book['author_id'] . '">' .$book['author_name'] . ' ' . $book['author_surname'] .'</a></td>';
    echo '<td>'. $book['book_name'] .'</td>';
    echo '<td>'. $book['genre_name'] .'</td>';
    echo '<td>'. $book['book_pages'] .'</td>';
    echo '<td>'. $book['book_publisher_year'] .'</td>';
    echo '<td><a href="index.php?object=book&show=edition&id='. $book['edition_id'] . '">' . $book['edition_name'] .'</a></td>';
    echo '<td>'. $book['book_receipt'] .'</td>';
    echo '<td><a href="index.php?object=book&action=delete&id='. $book['book_id'] .'">Видалити</a></td>';
    echo '</tr>';
}

echo '</table>'
?>

<style>
    table, td{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

</style>
