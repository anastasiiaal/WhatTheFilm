<?php
include('templates/head.php');
?>
<body>
<?php
    include('templates/header.php');
    include('templates/separator.php');
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
            include('templates/card-movie.php');
        }
        ?>
    </div>
    <button class="btn-primary">See more films</button>
</section>



<?php
    include('templates/footer.php');
?>
    <script src="script/main.js"></script>
</body>
</html>