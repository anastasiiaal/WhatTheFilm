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
<section id="cast-crew" class="cast-crew">
    <?php
    include('views/templates/separator.php');
    ?>
    <div class="container dflex">
        <div class="cast-crew__wrapper">
            <div class="crew__wrapper dflex">
                <?php 
                    for($i = 0; $i <= 3; $i++) {
                        include('views/templates/persona.php');
                    }
                ?>
            </div>
            <div class="cast__wrapper dflex">
                <?php 
                    for($i = 0; $i <= 3; $i++) {
                        include('views/templates/persona.php');
                    }
                ?>
            </div>
        </div>
        <div class="film-details">
            <ul>
                <li>
                    <h4>Original title</h4>
                    <p class="txt-reg">Original and longer name of the film</p>
                </li>
                <li>
                    <h4>Release Date</h4>
                    <p class="txt-reg">April, 2022 </p>
                </li>
                <li>
                    <h4>Genre</h4>
                    <p class="txt-reg">Comedy, Animation</p>
                </li>
                <li>
                    <h4>Original Language</h4>
                    <p class="txt-reg">English</p>
                </li>
                <li>
                    <h4>Director</h4>
                    <p class="txt-reg">Dean Fleischer-Camp</p>
                </li>
                <li>
                    <h4>Country of origin</h4>
                    <p class="txt-reg">USA, UK, France</p>
                </li>
                <li>
                    <h4>Runtime</h4>
                    <p class="txt-reg">1h 29m</p>
                </li>
                <li>
                    <h4>Budget</h4>
                    <p class="txt-reg">1.3 M</p>
                </li>
                <li>
                    <h4>Revenue</h4>
                    <p class="txt-reg">2.5 M</p>
                </li>
            </ul>
        </div>
    </div>
</section>



<?php
    include('views/templates/footer.php');
?>
    <script src="views/script/main.js"></script>
</body>
</html>