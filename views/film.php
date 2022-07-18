<?php
include('templates/head.php');
?>
<body>
<?php
    if(isset($_GET["id"])) {
        $getMovie = $movieDB->getMovie(intval($_GET["id"]));
        $getCrew = $movieDB->getCrew(intval($_GET["id"]));
        $getActors = $movieDB->getActors(intval($_GET["id"]));
    }
    include('templates/header.php');
    include('templates/trailer-overlay.php');
?>
<section class="film-main">
    <div class="container dflex">
        <img class="poster-img" src="<?= $getMovie['poster_path'] === "https://image.tmdb.org/t/p/original/" ? 'img/poster.png' : $getMovie['poster_path'] ?>" alt="Poster '<?= $getMovie['title'] ?>'">
        <div class="film__info-wrapper">
            <h1><?= $getMovie['title'] ?></h1>
            <p class="txt-sm"><span class="infospan infospan-year"><?= $getMovie['year'] ?></span> | <span class="infospan infospan-runtime"><?= $getMovie['runtime'] ?></span> | <span class="infospan infospan-country"><?= $getMovie['production_countries'] ?></span></p>
            <div class="film__genres dflex">
                <?php
                if($getMovie['genres'] !== "-") {
                    foreach(explode(",", $getMovie['genres']) as $genre){
                        echo "<p class='menu selected'>$genre</p>";
                    }
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
    $h2 = "Cast & Crew";
    include('templates/separator.php');
    ?>
    <div class="container dflex">
        <div class="cast-crew__wrapper">
            <div class="crew__wrapper dflex">
                <?php 
                if($getActors !== null) {
                    for($i = 0; $i <= count($getActors)-1; $i++) { ?>
                        <div class="persona dflex">
                            <?php if ($getActors[$i] !== null) { ?>
                                <img src="<?= $getActors[$i]['profile_path'] === "https://image.tmdb.org/t/p/w500" ? './img/poster.png' :$getActors[$i]['profile_path'] ?>" alt="persona">
                                <div class="persona__txt-wrapper">
                                    <h4><?= $getActors[$i]['name'] ?></h4>
                                    <p class="txt-sm"><?= $getActors[$i]['character'] ?></p>
                                </div>
                            <?php } else { echo "<div></div>"; } ?>
                        </div>
                    <?php } 
                } ?>
               
            </div>
            <div class="cast__wrapper dflex">
                <?php 
                if($getCrew !== null) {
                    for($i = 0; $i <= count($getCrew)-1 ; $i++) { ?>
                        <div class="persona dflex">
                            <?php if ($getCrew[$i] !== null) { ?>
                                <img src="<?= $getCrew[$i]['profile_path'] === "https://image.tmdb.org/t/p/w500" ? './img/poster.png' :$getCrew[$i]['profile_path'] ?>" alt="persona">
                                <div class="persona__txt-wrapper">
                                    <h4><?= $getCrew[$i]['name'] ?></h4>
                                    <p class="txt-sm"><?= $getCrew[$i]['job'] ?></p>
                                </div>
                            <?php } else { echo "<div></div>"; } ?>
                        </div>
                    <?php } 
                } ?>
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
                    if($getCrew !== null) {
                        for($i=0; $i<count($getCrew); $i++) {
                            if($getCrew[$i]['job'] === 'Director') {
                                $director = $getCrew[$i]['name'];
                            } else { 
                                $director = "-";
                            }
                        }
                    ?>
                        <p class="txt-reg"><?= $director ?></p>
                    <?php } else { ?>
                        <p class="txt-reg">-</p>
                    <?php } ?>
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