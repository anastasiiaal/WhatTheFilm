<?php
include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    include('templates/separator.php');
?>
<?php
    // $getFilmsByGenre = $movieDB->getFilmsByGenre('');
    
?>
<?php
    $searchQuery = "";
    $getSearchResult = [];
    if(isset($_GET["search"])) {
        $searchQuery = $_GET["search"];
        $searchQuery = $new = str_replace(' ', '%20', $searchQuery);   // replaces whitespace with %20 symbol to let it be inserted in a URL
        $getSearchResult = $movieDB->getSearchResult($searchQuery);
    } else {
        echo "<h1> NOPE </h1>"; 
    }
?>
<section class="films dflex">
    <div class="container dflex">
        <?php if (gettype($getSearchResult) === 'array') {  ?>
            <?php foreach($getSearchResult as $film) { ?>
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
        <?php } else { ?>
            <?= "<h2> Sorry no result </h2>"   ?>
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