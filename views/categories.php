<?php
include('templates/head.php');
?>
<body>

<?php
    include('templates/header.php');
    $h2 = "Categories";
    include('templates/separator.php');
?>
<section class="categories-list" id="categories-list">
    <div class="container dflex" id="cat-container">
        <!-- categories are generated here -->
    </div>
</section>
<section class="films dflex">
    <div class="container dflex">
        <!-- movie cards are genereated here -->
    </div>

    <div class="btn-container">
        <div class="btn-wrapper dflex">
            <button class="btn-primary" id="prev">< PREV</button></a>
            <h4 id="current-page">Page <span></span> out of <span></span> </h4>
            <button class="btn-primary" id="next">NEXT ></button>
        </div>
    </div>

</section>

<?php
    include('templates/footer.php');
?>
    <script src="script/categories.js"></script>
</body>
</html>