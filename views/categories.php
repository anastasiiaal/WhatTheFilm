<?php
    $titlePage = 'Categories';
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
<?php
if(!empty($_GET)) {
    if (isset($_GET['idgenre'])) {
        if (
            $_GET['idgenre'] != 28
            && $_GET['idgenre'] != 12
            && $_GET['idgenre'] != 16
            && $_GET['idgenre'] != 35
            && $_GET['idgenre'] != 80
            && $_GET['idgenre'] != 99
            && $_GET['idgenre'] != 18
            && $_GET['idgenre'] != 10751
            && $_GET['idgenre'] != 14
            && $_GET['idgenre'] != 36
            && $_GET['idgenre'] != 27
            && $_GET['idgenre'] != 10402
            && $_GET['idgenre'] != 9648
            && $_GET['idgenre'] != 10749
            && $_GET['idgenre'] != 878
            && $_GET['idgenre'] != 10770
            && $_GET['idgenre'] != 53
            && $_GET['idgenre'] != 10752
            && $_GET['idgenre'] != 37
        ) {
            echo "<h2 style='display: inline-block; margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2>"; 
            include('templates/footer.php');
            die();
        }
    } else {
        echo "<h2 style='display: inline-block; margin-left: 50%; transform: translateX(-50%)'> Sorry no results found </h2>"; 
        include('templates/footer.php');
        die();
    }
}
?>
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
    <script src="script/main.js"></script>
    <script src="script/categories.js"></script>
</body>
</html>