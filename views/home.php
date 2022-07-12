<?php
    include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
?>
<!-- __________ CATEGORIES CAROUSEL __________ -->
<?php
    $h2 = "Categories";
    include('templates/separator.php');
    include('templates/carousel-categories.php');
?>
<!-- end CATEGORIES CAROUSEL -->

<!-- __________ NEW RELEASES SECTION __________ -->
<?php
    $h2 = "New releases";
    include('templates/separator.php');

    $getFilms_upcoming = $movieDB->getFilms("upcoming");
?>
<section class="films dflex" id="new-releases">
    <div class="container dflex">
        <?php foreach($getFilms_upcoming as $film) { ?>
            <a href="./film.php?id=<?= $film['id'] ?>" class="card-movie__link">
                <div class="card-movie">
                    <img src="<?= $film['poster_path'] === "https://image.tmdb.org/t/p/w500" ? 'img/poster.png' : $film['poster_path'];?>" alt="<?= $film['title'] ?>">
                    <div class="card-info">
                        <h4><?= $film['title'] ?></h4>
                        <p class="txt-sm"><?= $film['year'] ?></p>
                        <h4 class="<?php if ($film['vote_average'] >= 7) { echo "green";} else if ($film['vote_average'] < 8 && $film['vote_average'] >= 5) {echo "orange";} else { echo "red";} ?>"><?= $film['vote_average'] ?></h4>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>
<!-- end NEW RELEASES SECTION -->

<!-- __________ TOP100 SECTION __________ -->
<?php
    $h2 = "Top 100";
    include('templates/separator.php');
    
    $getFilms_topRated = $movieDB->getFilms("top_rated");
?>
<section class="films dflex">
    <div class="container dflex">
        <?php foreach($getFilms_topRated as $film) { ?>
            <a href="./film.php?id=<?= $film['id'] ?>" class="card-movie__link">
                <div class="card-movie">
                    <img src="<?= $film['poster_path'] === "https://image.tmdb.org/t/p/w500" ? 'img/poster.png' : $film['poster_path'];?>" alt="<?= $film['title'] ?>">
                    <div class="card-info">
                        <h4><?= $film['title'] ?></h4>
                        <p class="txt-sm"><?= $film['year'] ?></p>
                        <h4 class="<?php if ($film['vote_average'] >= 7) { echo "green";} else if ($film['vote_average'] < 8 && $film['vote_average'] >= 5) {echo "orange";} else { echo "red";} ?>"><?= $film['vote_average'] ?></h4>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</section>
<!-- end TOP100 SECTION -->
<?php
    include('templates/footer.php');
?>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>   
    <script src="script/main.js"></script>
    <script src="script/carousel.js"></script>
</body>
</html>
