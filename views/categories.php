<?php
include('templates/head.php');
$meaning = "";
?>
<body>
<p id='getId' style='color: white'></p>
<?php
    // __________ ANA - TEST FOR FETCH ____________________________
    // $data = json_decode(file_get_contents('php://input'), true);
    // $genres = $_POST["genres"];
    // echo $genres;

    include('templates/header.php');
    $h2 = "Categories";
    include('templates/separator.php');
    $getGenres = $movieDB->getGenres();
    
?>
<?php
    $getGenres = $movieDB->getGenres();
    $selectedGenres = [];
    $genresToUrl = "";
    
    if (isset($_GET['idgenre'])) {
        array_push($selectedGenres, $_GET['idgenre']);
        // var_dump($selectedGenres);
        $genresToUrl = implode(",", $selectedGenres);
        // var_dump($genresToUrl);
    }
    $getFilmsByGenre = $movieDB->getFilmsByGenre($genresToUrl);
?>
<section class="categories-list" id="categories-list">
    <div class="container dflex">
        <?php foreach($getGenres as $genre) { ?>
        <p class="menu <?php if(isset($_GET['idgenre']) && $genre['id'] == $_GET['idgenre']) {echo "selected";} ?>" data-id="<?= $genre['id'] ?>" id="<?= $genre['id'] ?>"><?= $genre['name'] ?></p>
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
    <div class="btn-container">
        <div class="btn-wrapper dflex">
            <button class="btn-primary deactivated">< PREV</button>
            <button class="btn-primary">NEXT ></button>
        </div>
    </div>
    <!-- <button class="btn-primary">See more films</button> -->
</section>



<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>