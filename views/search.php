<?php
    $titlePage = 'Search results';
    include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    if(isset($_GET["search"])) {
        $h2 = "Search results of : " . $_GET['search'];
    } else {
        $h2 = "Search results";
    }
    include('templates/separator.php');
?>
<?php
    $searchQuery = "";
    $getSearchResult = [];
    if(isset($_GET["search"])) {
        if ($_GET["search"] === "" || $_GET["search"] === "  " || $_GET["search"] === "   " || $_GET["search"] === "    ") {
            echo "<div class='container dflex'><h2 style='display: inline-block; margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2></div>"; 
            include('templates/footer.php');
            die();
        } else {
            $searchQuery = $_GET["search"];
            $searchQuery = $new = str_replace(' ', '%20', $searchQuery);   // replaces whitespace with %20 symbol to let it be inserted in a URL
            if(isset($_GET['page'])) {
                $getSearchResult = $movieDB->getSearchResult($searchQuery, $_GET['page']);
                $getSearchPages = $movieDB->getSearchPages($searchQuery,  $_GET['page']);
            } else {
                $getSearchResult = $movieDB->getSearchResult($searchQuery);
                $getSearchPages = $movieDB->getSearchPages($searchQuery);
            }
        }
    } else {
        echo "<div class='container dflex'><h2 style='margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2></div>"; 
        include('templates/footer.php');
        die();
    }
    
    if (!isset($_GET['page'])) {
        $actualPage = 1;
    } else {
        $actualPage = $_GET['page'];

        if($_GET['page'] > $getSearchPages['total_pages']) {
            $getSearchResult = $movieDB->getSearchResult($searchQuery, 1);
            $getSearchPages = $movieDB->getSearchPages($searchQuery, 1);
            $actualPage = 1;
        }
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
                            <h4 class="<?php if ($film['vote_average'] >= 7) { echo "green";} else if ($film['vote_average'] < 8 && $film['vote_average'] >= 5) {echo "orange";}  else if ($film['vote_average'] == 0) {echo "";} else { echo "red";} ?>"><?= $film['vote_average'] ?></h4>
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
                        <a href="search.php?search=<?= $searchQuery ?>&page=<?= intval($actualPage - 1) ?>"><button class="btn-primary">< PREV</button></a>
                    <?php } ?>

                    <h4>Page <?= $actualPage ?> out of <?= $getSearchPages['total_pages'] ?></h4>

                    <?php if($getSearchPages['page'] === $getSearchPages['total_pages']) { ?>
                        <button class="btn-primary deactivated">NEXT ></button>
                    <?php } else { ?>
                        <a href="search.php?search=<?= $searchQuery ?>&page=<?= intval($actualPage + 1) ?>"><button class="btn-primary">NEXT ></button></a>
                    <?php } ?>
                </div>
            </div>
    <?php } ?>
</section>

<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>