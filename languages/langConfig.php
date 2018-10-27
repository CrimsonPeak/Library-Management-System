<?php
	// To have a multilingual page
    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = "en";
    }
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
        if ($_GET['lang'] == "en"){
            $_SESSION['lang'] = "en";
        }
        else if ($_GET['lang'] == "tr"){
            $_SESSION['lang'] = "tr";
        }
        else if ($_GET['lang'] == "de"){
            $_SESSION['lang'] = "de";
        }
    }

    require_once $_SESSION['lang'] . ".php";
?>