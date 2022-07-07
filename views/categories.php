<?php
include('views/templates/head.php');
?>
<body>
<?php
    include('views/templates/header.php');
    include('views/templates/separator.php');
?>
<section class="categories-list" id="categories-list">
    <div class="container dflex">
        <?php for ($i = 0; $i < 20; $i++) { ?>
        <p class="menu">Action</p>
        <?php } ?>
    </div>
</section>
<section class="films dflex">
    <div class="container dflex">
        <?php 
        for ($i = 0; $i<20; $i++) {
            include('views/templates/card-movie.php');
        }
        ?>
    </div>
    <button class="btn-primary">See more films</button>
</section>



<?php
    include('views/templates/footer.php');
?>
    <script src="views/script/main.js"></script>
</body>
</html>