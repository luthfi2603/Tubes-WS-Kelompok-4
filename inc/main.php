<?php

if ($_GET) {
    switch ($_GET['p']) {
        case "search":
            include "./page/search.php";
            break;
        case "about":
            include "./page/about.php";
            break;
        case "category":
            include "./page/category.php";
            break;
        case "single":
            include "./page/single.php";
            break;
        default:
            echo "
                <div class='not-found'>404 Page Not Found</div>
            ";
            break;
    }
} else {
    include "./page/home.php";
}