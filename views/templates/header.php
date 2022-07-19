<?php
$getGenres = $movieDB->getGenres();
$columnSize = intdiv(sizeof($getGenres), 2) + 1;
?>
<header class="header" id="header">
    <div class="container">
        <div class="nav-wrapper dflex">
            <a href="./home.php">
                <img src="./img/logo.svg" alt="Logo">
            </a>
            <nav>
                <ul class="dflex" id="ul-nav">
                    <li>
                        <a href="./home.php">Home</a>
                    </li>
                    <li>
                        <a href="./home.php#new-releases">New releases</a>
                    </li>
                    <li>
                        <a href="./categories.php">Categories</a>
                        <div class="nav__categories dflex">
                            <ul>
                                <?php for ($i = 0; $i < $columnSize; $i++) { ?>
                                <li class="category-link">
                                    <a href="./categories.php?idgenre=<?= $getGenres[$i]['id'] ?>" id="<?= $getGenres[$i]['id'] ?>"><?= $getGenres[$i]['name'] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                            <ul>
                                <?php for ($i = $columnSize; $i < sizeof($getGenres); $i++) { ?>
                                <li class="category-link">
                                    <a href="./categories.php?idgenre=<?= $getGenres[$i]['id'] ?>" id="<?= $getGenres[$i]['id'] ?>"><?= $getGenres[$i]['name'] ?></a>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="burger dflex" id="burger">
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                </div>
                <div class="close-burger" id="close-burger">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" id="btn_close-modal">
                        <line x1="30.4142" y1="2.14273" x2="2.12994" y2="30.427" stroke="#EEEEEE" stroke-width="4"/>
                        <line x1="30.9998" y1="30.2013" x2="2.71558" y2="1.91699" stroke="#EEEEEE" stroke-width="4"/>
                    </svg>
                </div>
            </nav>
            <form id="form" action="./search.php" method="get">
                <input type="text" placeholder="Search" id="search" class="search" name="search" pattern="[a-zA-Z0-9- ?!+',.:]{2,25}" title="2 to 25 letters or numbers" required>
            </form>
        </div>
    </div>
</header>