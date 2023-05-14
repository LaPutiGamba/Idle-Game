<?php
    include "userInfo.php";
    include "changeValues.php";

    if (isset($_GET["selectFunction"])) $selectFunction = $_GET["selectFunction"]; 
    if (isset($_GET["numPlantation"])) $numPlantation = $_GET["numPlantation"];    
    if (isset($_GET["timestampValue"])) $timestampValue = $_GET["timestampValue"];    
    if (isset($_GET["cropSelected"])) $cropSelected = $_GET["cropSelected"];    
    
    switch ($selectFunction) {
    case 1:
        userRegister();
        break;
    case 2:
        userLogIn();
        break;
    case 3:
        timestampChange($numPlantation, $timestampValue);
        break;
    case 4:
        checkingStatusPlantation();
        break;
    case 5:
        cropInField($numPlantation, $cropSelected);
        break;
    default:
    }
?>