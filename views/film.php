<?php
include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    include('templates/trailer-overlay.php');
    $getMovie = $movieDB->getMovie(496450);
    $getCrew = $movieDB->getCrew(122);
?>
<section class="film-main">
    <div class="container dflex">
        <img src="<?=$getMovie['poster_path'] ?>" alt="Poster" style="width: 300px; heigth: 450px">
        <div class="film__info-wrapper">
            <h1><?= $getMovie['title'] ?></h1>
            <p class="txt-sm"><span class="infospan infospan-year"><?= $getMovie['year'] ?></span> | <span class="infospan infospan-runtime"><?= $getMovie['runtime'] ?></span> | <span class="infospan infospan-country"><?= $getMovie['production_countries'] ?></span></p>
            <div class="film__genres dflex">
                <?php
                    foreach(explode(",", $getMovie['genres']) as $genre){
                        echo "<p class='menu selected'>$genre</p>";
                    }
                ?>
            </div>
            <p class="txt-lg">
                <?= $getMovie['overview'] ?>
            </p>
            <button id="btn-watch" class="btn-primary"> <img src="img/triangle.svg" alt="Watch"> Watch trailer</button>
        </div>
        <div class="film__rating dflex">
            <img src="img/star.svg" alt="Star">
            <p class="rating"><span><?= $getMovie['vote_average'] ?></span> / 10</p>
        </div>
    </div>
</section>
<section id="cast-crew" class="cast-crew">
    <?php
    include('templates/separator.php');
    ?>
    <div class="container dflex">
        <div class="cast-crew__wrapper">
            <div class="crew__wrapper dflex">
                <?php 
                    for($i = 0; $i <= 3; $i++) {
                        include('templates/persona.php');
                    }
                ?>
            </div>
            <div class="cast__wrapper dflex">
                <?php 
                    for($i = 0; $i <= 3; $i++) {
                        include('templates/persona.php');
                    }
                ?>
            </div>
        </div>
        <div class="film-details">
            <ul>
                <li>
                    <h4>Original title</h4>
                    <p class="txt-reg"><?= $getMovie['original_title'] ?></p>
                </li>
                <li>
                    <h4>Release Date</h4>
                    <p class="txt-reg"><?= $getMovie['full_date'] ?></p>
                </li>
                <li>
                    <h4>Genre</h4>
                    <p class="txt-reg"><?= $getMovie['genres'] ?></p>
                </li>
                <li>
                    <h4>Original Language</h4>
                    <p class="txt-reg"><?= $getMovie['original_language'] ?></p>
                </li>
                <li>
                    <h4>Director</h4>
                    <?php
                    for($i=0; $i<count($getCrew); $i++) {
                        if($getCrew[$i]['job'] === 'Director') {
                            $director = $getCrew[$i]['name'];
                        }
                    }
                    ?>
                    <p class="txt-reg"><?= $director ?></p>
                </li>
                <li>
                    <h4>Country of origin</h4>
                    <p class="txt-reg"><?= $getMovie['production_countries'] ?></p>
                </li>
                <li>
                    <h4>Runtime</h4>
                    <p class="txt-reg"><?= $getMovie['runtime'] ?></p>
                </li>
                <li>
                    <h4>Budget</h4>
                    <p class="txt-reg"><?= $getMovie['budget'] ?></p>
                </li>
                <li>
                    <h4>Revenue</h4>
                    <p class="txt-reg"><?= $getMovie['revenue'] ?></p>
                </li>
            </ul>
        </div>
    </div>
</section>



<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>