<?php
session_start();

require_once 'func.php';

define('COPYRIGHT', 'My First Blog &#169; 2020'); /* const */

$documentTitle = 'Тестовый блог' . ' для IT-школы'; //string
$viewsCount = 100 + rand(10, 50); //int
$canMakeReview = true; //book

$author = 'Admin';
$you = $_POST['name'] ?? $_SESSION['name'] ?? 'Admin';

$post = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
$post2 = $post;
$post2 .= 'Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim.';

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

if (!empty($_POST)) {
    $_SESSION['my-comments'][] = [
        'author' => $_SESSION['name'] = $_POST['name'],
        'text' => $_POST['comment'],
    ];
    session_write_close();
}

$commentAr = array_merge($songCommentsAr, $commentAr, $_SESSION['my-comments']);
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
