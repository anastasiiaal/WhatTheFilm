<div class="container">
    <div class="separator dflex">
        <div class="separator-line"></div>
        <?php 
        require_once('pagename.php');
        if ($pageName === 'categories.php') {
            $h2 = "Categories";
        } elseif ($pageName === 'film.php') {
            $h2 = "Cast & Crew";
        }
        ?> 
        <h2> <?php echo $h2 ?> </h2>
        <div class="separator-line"></div>
    </div>
</div>