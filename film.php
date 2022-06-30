<?php
include('views/templates/head.php');
?>
<body>
<?php
    include('views/templates/header.php');
    include('views/templates/trailer-overlay.php');
?>
<section class="film-main">
    <div class="container dflex">
        <img src="views/img/affiche.jpg" alt="Poster">
        <div class="film__info-wrapper">
            <h1>Title of the movie </h1>
            <p class="txt-sm"><span class="infospan infospan-year">2011</span> | <span class="infospan infospan-runtime">1h55</span> | <span class="infospan infospan-country">USA, England</span></p>
            <div class="film__genres dflex">
                <p class="menu selected">Adventure</p>
                <p class="menu selected">Animation</p>
                <p class="menu selected">Comedy</p>
            </div>
            <p class="txt-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Gravida venenatis sed molestie orci risus. Porta nulla etiam tristique id tristique pretium. Malesuada vehicula sagittis, nunc quam lacus in. Sit arcu ut ultrices proin bibendum interdum rutrum congue.
                Porta nulla etiam tristique id tristique pretium. Malesuada vehicula sagittis, nunc quam lacus in. Sit arcu ut ultrices proin bibendum.
            </p>
            <button id="btn-watch" class="btn-primary"> <img src="views/img/triangle.svg" alt="Watch"> Watch trailer</button>
        </div>
        <div class="film__rating dflex">
            <img src="views/img/star.svg" alt="Star">
            <p class="rating"><span>7.2</span> / 10</p>
        </div>
    </div>
</section>
<?php
    include('views/templates/separator.php');
?>



<?php
    include('views/templates/footer.php');
?>
    <script src="views/script/main.js"></script>
</body>
</html>