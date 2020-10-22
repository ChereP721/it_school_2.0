<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <title><?=$documentTitle?></title>
</head>
<body>
    <header>
        <nav>
            <a href="/blog.php">BLOG</a>
            <a href="/categories.php">CATEGORIES</a>
        </nav>
    </header>
    <main>
        <h1>Blog</h1>
        <article>
            <header>
                <h2 title="Mauris posuere">Mauris posuere</h2>
            </header>
            <figure>
                <img src="https://livedemo00.template-help.com/wordpress_50742/wp-content/uploads/2014/07/Depositphotos_12240275_original-200x150.jpg" alt="">
            </figure>
            <p><?=$post?></p>
            <button type="button">Read more</button>
            <hr>
            <footer>
                <div>
                    <div>
                        <i class="fa fa-calendar"></i>
                        <time datetime="2013-03-14T20:28:57">March 14, 2013</time>
                    </div>
                    <div>
                        <i class="fa fa-user"></i>
                        <a href="/" title="<?=($author === $you ? 'Your posts' : 'Posts by Author')?>"><?=($author === $you ? 'You' : 'Author')?></a>
                    </div>
                </div>
                <hr>
                <div>
                    <div title="View all posts in Uncategorized">
                        <i class="fa fa-bookmark"></i>
                        <a href="/">Uncategorized</a>
                    </div>
                    <div>
                        <i class="fa fa-comment"></i>
                        <a href="/" title="Comment on Mauris posuere">No comments</a>                 
                    </div>
                </div>
                <hr>
                <div title="Number of view.">
                    <i class="fa fa-eye"></i>
                    <span><?=$viewsCount?></span>
                </div>
                <hr>
                <div title="3 response">
                    <span>Comments</span>
                </div>
                <div>
                    <button type="button">
                        <span>Show Comments</span>
                    </button>
                    <ul>
                        <?php
                        foreach ($commentAr as $comment) {
                            ?>
                        <li>
                            <img src="/" alt="Avatar admin">
                            <div>
                                <div>
                                    <span>Admin</span>
                                    <time datetime="2013-03-14T20:28:57">March 14, 2013</time>
                                </div>
                                <p>
                                    <?=$comment?>
                                </p>
                            </div>
                        </li>
                        <?php
                            if ($comment === 'Апокрефично') {
                                if ($image) {
                                    echo '<li><img src="'.$image.'" /></li>';
                                }
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </footer>
        </article>
    </main>
    <footer>
        <span><?php echo COPYRIGHT; ?></span>
    </footer>

    <!-- Подготовка формы для добавления комментариев  -->
    <form action="/" method="post" name="form-comment" enctype="multipart/form-data">
        <fieldset>
            <legend>Leave a comment</legend>
            <p>
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="name">
            </p>
            <p>
                <label for="email">E-mail</label>
                <input type="text" id="email" placeholder="e-mail">
            </p>
            <p>
                <label for="comment">Your comment</label>
                <textarea name="comment " id="comment" cols="30" rows="10"></textarea>
            </p>
            <p>
                <label for="file">Image</label>
                <input name="file" type="file" id="file" accept="image/*">
            </p>
            <p>
                <button type="submit">Submit Comment</button>
            </p>
        </fieldset>
    </form>
</body>
</html>