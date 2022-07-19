

<div class="persona dflex">
    <img src="<?= $getCrew[$i]['profile_path'] === "https://image.tmdb.org/t/p/w500" ? './img/poster.png' :$getCrew[$i]['profile_path'] ?>" alt="persona">
    <div class="persona__txt-wrapper">
        <h4><?= $getCrew[$i]['name'] ?></h4>
        <p class="txt-sm"><?= $getCrew[$i]['job'] ?></p>
    </div>
</div>