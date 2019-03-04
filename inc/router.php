<?php
include "nav.php";
$includePath = "";

foreach ($nav as $path => $key) {
    switch (htmlspecialchars(isset($_GET["page"])) ? htmlspecialchars($_GET["page"]) : "") {
        case $path:
            $siteTitle = $key;
            $includePath = "page/$path.page.php";
            break;
        default:
            if (empty($includePath)) {
                $siteTitle = "Pagrindinis";
                $includePath = "pages/home.page.php";
            }
            break;
    }
}
