<?php
$getMovie = $movieDB->getMovie(122);
$getCrew = $movieDB->getCrew(122);
?>

<div class="info-movie">
    <h4>Original title</h4>
    <p class="txt-reg"><?= $getMovie['original_title'] ?></p>

    <h4>Release Date</h4>
    <p class="txt-reg"><?= $getMovie['full_date'] ?></p>

    <h4>Genre</h4>
    <p class="txt-reg"><?= $getMovie['genres'] ?></p>

    <h4>Original Language</h4>
    <p class="txt-reg"><?= $getMovie['original_language'] ?></p>

    <h4>Director</h4>
    <p class="txt-reg"><?= $getCrew['name'] ?></p>

    <h4>Country of origin</h4>
    <p class="txt-reg"><?= $getMovie['production_countries'] ?></p>

    <h4>Runtime</h4>
    <p class="txt-reg"><?= $getMovie['runtime'] ?></p>

    <h4>Budget</h4>
    <p class="txt-reg"><?= $getMovie['budget'] ?></p>

    <h4>Revenue</h4>
    <p class="txt-reg"><?= $getMovie['revenue'] ?></p>
</div>

