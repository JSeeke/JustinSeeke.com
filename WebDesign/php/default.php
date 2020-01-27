<?php
    include './php/QRapp.php';
    
    if (!is_null($_GET["qr"])) {
        $QRapp = new QRapp();
        header("Location: ".$QRapp->activeURL);
        
    } elseif (!is_null($_GET["QRapp"])) {
        $command = $_GET["command"];
        $QRapp = new QRapp();
        if ($command == "set") {
            $QRapp->set($_GET["index"]);
            
        } elseif ($command == "add") {
            $QRapp->add($_GET["name"], $_GET["URL"]);
            
        } elseif ($command == "delete") {
            $QRapp->delete($_GET["index"]);
        }
        $QRapp->render();
        
    } else {
        header("Location: html/homepage.html");
    }
?>
