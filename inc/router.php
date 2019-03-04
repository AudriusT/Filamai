<?php
include "nav.php";
$includePath ="";

foreach ($nav as $path => $key){
    switch (isset($_GET["page"]) ? $_GET["page"] : ""){
        case $path;
        $siteTitle = $key;
        $includePath = "pages/$path.page.php";
        break;
        case $path;
        default:
            if (empty($includePath)) {
                $siteTitle = "Pagrindinis";
                $includePath = "pages/home.page.php";
            }
            break;
    }
}