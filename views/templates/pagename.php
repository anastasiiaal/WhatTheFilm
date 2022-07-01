<?php
// helps retrieving the name of the current page to insert the correct h2 in the separation line
$linkArray = strval($_SERVER['PHP_SELF']);
$linkArrayExplode = explode('/', $linkArray);
$pageName = end($linkArrayExplode);
?>