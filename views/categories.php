<?php
include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    include('templates/separator.php');
    $getGenres = $movieDB->getGenres();
?>
<?php
    $getGenres = $movieDB->getGenres();
    $selectedGenres = [];

    $getFilmsByGenre = $movieDB->getFilmsByGenre('36,27');
?>
<section class="categories-list" id="categories-list">
    <div class="container dflex">
        <?php foreach($getGenres as $genre) { ?>
        <p class="menu" id="<?= $genre['id'] ?>"><?= $genre['name'] ?></p>
        <?php } ?>
    </div>
</section>
<section class="films dflex">
    <div class="container dflex">
        <?php foreach($getFilmsByGenre as $film) { ?>
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
    <button class="btn-primary">See more films</button>
</section>



<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>