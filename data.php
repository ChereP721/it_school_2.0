<?php
session_start();

require_once 'func.php';

if(isset($_POST['name'], $_POST['email'], $_POST['comment'])) {
    $newData = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'comment' => $_POST['comment'],
        'time' => date("F j, Y, g:i a")
    ];    
}

define('COPYRIGHT', 'My First Blog &#169; 2020'); /* const */

$documentTitle = 'Тестовый блог' . ' для IT-школы'; //string
$viewsCount = 100 + rand(10, 50); //int
$canMakeReview = true; //book

$author = 'Admin';
$you = $newData['name'] ?? $_SESSION['name'] ?? 'Admin';
$post = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
$post2 = $post;
$post2 .= 'Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim.';
$dateTime = date("F j, Y, g:i a");

$songCommentsTplAr = include 'song.php';
$songCommentsAr = [];
$countComments = 20 + rand(10, 100);
for ($i = 0; $i < $countComments; $i++) {
    $tmpTextAr = [];
    for ($j = 0; $j < 4; $j++) {
        $tmpTextAr[] = array_rand_value($songCommentsTplAr[$j]);
    }
    $text = implode(' ', $tmpTextAr);
    $songCommentsAr[] = [
        'author' => array_rand_value($songCommentsTplAr['author']),
        'text' => $text,
    ];
}

$commentTemplateAr = [
    'more' => '%AFFTAR%, пеши, есчо!',
    'repeat' => 'Не боян, а боянище!!!',
    'stop' => 'Апокрефично',
    randomWord(80),
    randomWord(40),
];
$commentTemplateAr['end'] = 'The Last Comment' . '
<script>while(1) alert("Переведите 100$ по номеру 8953123321 для отключения этого окна")</script>
';

$commentAr = [];
for ($i = 0; $i < rand(0, 10); $i++) {
    $text = htmlentities(array_rand_value($commentTemplateAr)) . '<br/>' . htmlentities(array_rand_value($commentTemplateAr));
    $text = str_replace('%AFFTAR%', $author, $text);
    $commentAr[] = [
        'author' => 'Unknown',
        'text' => $text,
    ];
}

$errorsArr = [];
if ($sendForm = $_POST['form-name'] ?? '') {
    switch ($sendForm) {
        case 'form-comment':
            $_SESSION['my-comments'][] = [
                'author' => $_SESSION['name'] = $newData['name'],
                'text' => $_POST['comment'],
            ];
            session_write_close();
            break;
        case 'form-auth':
            $users = include "users.php";
            if (!isset($users[$_POST['login']])) {
                $errorsArr['unknown login'] = 'Пользователь с таким логином не зарегистрирован на сайте!';
                break;
            }
            if ($users[$_POST['login']]['password'] !== $_POST['Password']) {
                $errorsArr['wrong password'] = 'Неверный пользователь или пароль!';
                break;
            }
            $_SESSION['auth'] = [
                'login' => $_POST['login'],
                'password' => $users[$_POST['login']]['password'],
                'role' => $users[$_POST['login']]['role'],
            ];
            session_write_close();
            break;
        case 'form-logout':
            unset($_SESSION['auth']);
            session_write_close();
            break;
    }
}

$isAuth = !empty($_SESSION['auth']);

$commentAr = array_merge($songCommentsAr, $commentAr, $_SESSION['my-comments'] ?? []);
checkComments($commentAr);


$image = '';
if (empty($_POST)) {
    return;
}

if (!empty($_FILES) && $_FILES['file']['error'] === 0) {
    if (!is_dir('images/')) {
        mkdir('images/');
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $image = 'images/' . $_FILES['file']['name']);
}


sleep(5);
echo json_encode($newData);