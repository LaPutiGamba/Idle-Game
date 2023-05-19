<?php
    include "userInfo.php";
    include "changeValues.php";

    if (isset($_GET["selectFunction"])) $selectFunction = $_GET["selectFunction"]; 
    if (isset($_GET["numPlantation"])) $numPlantation = $_GET["numPlantation"];    
    if (isset($_GET["timestampValue"])) $timestampValue = $_GET["timestampValue"];    
    if (isset($_GET["cropSelected"])) $cropSelected = $_GET["cropSelected"];    
    if (isset($_GET["selectedMaterial"])) $selectedMaterial = $_GET["selectedMaterial"];    
    if (isset($_GET["selectedPlantation"])) $selectedPlantation = $_GET["selectedPlantation"];  
    if (isset($_GET["numCoop"])) $numCoop = $_GET["numCoop"];    
    
    switch ($selectFunction) {
    case 1:
        userRegister();
        break;
    case 2:
        userLogIn();
        break;
    case 3:
        timestampFieldCrops($numPlantation, $timestampValue);
        break;
    case 4:
        checkingStatusPlantation();
        break;
    case 5:
        cropInField($numPlantation, $cropSelected);
        break;
    case 6:
        materialUpdate($selectedPlantation, $selectedMaterial);
        break;
    case 7:
        timestampCoops($numCoop, $timestampValue);
        break;
    case 8:
        timestampCoopsSet($numCoop);
        break;
    case 9:
        checkingStatusCoop();
        break;
    default:
    }
?>