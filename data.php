<?php
define('COPYRIGHT', 'My First Blog &#169; 2020'); /* const */

$documentTitle = 'Тестовый блог' . ' для IT-школы'; //string
$viewsCount = 100 + rand(10, 50); //int
$canMakeReview = true; //book

$author = 'Admin';
$you = 'Admin';

$post = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
$post2 = $post;
$post2 .= 'Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim.';

function ed($value): void
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function randomWord(int $size = 8): string
{
    $returnValue = '';

    for ($i = 0; $i < $size; $i++) {
        $genRandom = 48;
        switch (rand(0, 2)) {
            case 0:
                $genRandom = rand(48, 57);
                break;
            case 1:
                $genRandom = rand(65, 90);
                break;
            case 2:
                $genRandom = rand(97, 122);
                break;
        }

        $returnValue .= chr($genRandom);
    }

    return $returnValue;
}

$commentTemplateAr = [
    'Афтар, пеши, есчо!',
    'Не боян, а боянище!!!',
    'Апокрефично',
    randomWord(80),
    randomWord(40),
];
$comment = $commentTemplateAr[array_rand($commentTemplateAr)];

$commentAr = [];
for ($i = 0; $i < rand(0, 10); $i++) {
    $commentAr[] = $commentTemplateAr[array_rand($commentTemplateAr)];
}

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
