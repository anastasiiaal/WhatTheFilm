<?php
require_once 'model/MovieDB.php';    
require_once 'c:/wamp64/www/.gitignore/_api.php';
$movieDB = new MovieDB($API_KEY);

// $getSearchResult = $movieDB->getSearchResult("boy");
// $getMovie = $movieDB->getMovie(122);
// $getGenres = $movieDB->getGenres();
// $getFilmsByGenre = $movieDB->getFilmsByGenre('24,36');
// $getActors = $movieDB->getActors(122);
// $getCrew = $movieDB->getCrew(122);

?>

<!-- <h2>List of genres</h2>
<div class="container" style="display: flex; flex-wrap: wrap">
    <?php foreach($getGenres as $genre) { ?>
        <div class="div" style="text-align: center; padding: 10px; margin: 10px; border: 1px solid grey" id="<?= $genre['id'] ?>"><?= $genre['name'] ?> <br> <?= $genre['id'] ?> </div>
    <?php  }  ?>
</div> -->