<?php
include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    $h2 = "Search results of : " . $_GET['search'];
    include('templates/separator.php');
?>
<?php
    $searchQuery = "";
    $getSearchResult = [];
    $getPage = 1;
    if(isset($_GET["search"])) {
        if ($_GET["search"] === "" || $_GET["search"] === "  " || $_GET["search"] === "   ") {
            echo "<h2 style='display: inline-block; margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2>"; 
        } else {
            $searchQuery = $_GET["search"];
            $searchQuery = $new = str_replace(' ', '%20', $searchQuery);   // replaces whitespace with %20 symbol to let it be inserted in a URL
            $getSearchResult = $movieDB->getSearchResult($searchQuery);
        }
    } else {
        echo "<h2 style='margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2>"; 
    }
    
    $getSearchPages = $movieDB->getSearchPages($searchQuery, $getPage);
    // var_dump($getSearchResult[20]['total_pages']);
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
            <?= "<h2 style='margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2>"   ?>
        <?php } ?>
    </div>

    <?php
    if($getSearchPages['total_pages'] > 1) { ?>
        <div class="btn-container">
                <div class="btn-wrapper dflex">
                    <?php
                    if($getSearchPages['page'] === 1) { ?>
                        <button class="btn-primary deactivated">< PREV</button>
                    <?php } else { ?>
                        <button class="btn-primary">< PREV</button>
                    <?php }
                    if($getSearchPages['page'] === $getSearchPages['total_pages']) { ?>
                        <button class="btn-primary deactivated">NEXT ></button>
                    <?php } else { ?>
                        <button class="btn-primary">NEXT ></button>
                     <?php } ?>
                </div>
            </div>
    <?php } ?>
    
    <!-- <button class="btn-primary">See more films</button> -->
</section>

<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>