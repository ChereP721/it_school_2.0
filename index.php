<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Document</title>
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget
            ipsum ornare molestie scelerisque eros dignissim. Phasellus fringilla hendrerit lectus nec vehicula.
            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In faucibus, 
            risus eu volutpat pellentesque, massa felis feugiat velit, nec...</p>
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
                        <a href="/" title="Posts by Author">Author</a>
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
                    <span>136</span>
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
                        <li>
                            <img src="/" alt="Avatar admin">
                            <div>
                                <div>
                                    <span>Admin</span>
                                    <time datetime="2013-03-14T20:28:57">March 14, 2013</time>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </footer>
        </article>
    </main>
    <footer>
        <span>My First Blog &#169; 2020</span>
    </footer>

    <!-- Подготовка формы для добавления комментариев  -->
    <form action="/" method="post" name="form-comment">
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
                <button type="submit">Submit Comment</button>
            </p>
        </fieldset>
    </form>
</body>
</html>