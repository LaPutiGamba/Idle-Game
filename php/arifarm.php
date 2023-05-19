<?php
	// Start the session.
	session_start(); 

    if (!isset($_SESSION["userConnection"])) header("Location: ../index.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Arifarm</title>
		<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <link href="../style.css" rel="stylesheet" type="text/css">
        <script src="../script.js"></script>
    </head>
    
    <body onload="start(IDscreen)" onresize="resize(IDscreen)">
		<div id="IDscreen">
            <div id="loadingScene">
                <h1>Loading...</h1>
            </div>

            <div id="game">
                <div id="gameCrops">
                    <div id="interface">
                        <img src="../images/coins.png" alt="Coins" id="coins">
                        <?php echo "<p>Coins</p>" ?>
                        <button type="button" onclick="location.href='userLogOut.php';" id="logOut">LOG OUT</button> 
                    </div>
                    <div class="plantations" id="plantation1" onclick="recolectCrops(1)">
                        <img src="../images/wheat.png" onclick="plantations(1, 1)" data-crops="P1" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(1, 2)" data-crops="P1" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(1, 3)" data-crops="P1" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(1, 4)" data-crops="P1" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(1, 5)" data-crops="P1" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(1, 6)" data-crops="P1" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                    <div class="plantations" id="plantation2" onclick="recolectCrops(2)">
                        <img src="../images/wheat.png" onclick="plantations(2, 1)" data-crops="P2" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(2, 2)" data-crops="P2" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(2, 3)" data-crops="P2" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(2, 4)" data-crops="P2" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(2, 5)" data-crops="P2" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(2, 6)" data-crops="P2" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                    <div class="plantations" id="plantation3" onclick="recolectCrops(3)">
                        <img src="../images/wheat.png" onclick="plantations(3, 1)" data-crops="P3" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(3, 2)" data-crops="P3" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(3, 3)" data-crops="P3" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(3, 4)" data-crops="P3" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(3, 5)" data-crops="P3" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(3, 6)" data-crops="P3" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                    <br>
                    <div class="plantations" id="plantation4" onclick="recolectCrops(4)">
                        <img src="../images/wheat.png" onclick="plantations(4, 1)" data-crops="P4" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(4, 2)" data-crops="P4" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(4, 3)" data-crops="P4" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(4, 4)" data-crops="P4" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(4, 5)" data-crops="P4" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(4, 6)" data-crops="P4" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                    <div class="plantations" id="plantation5" onclick="recolectCrops(5)">
                        <img src="../images/wheat.png" onclick="plantations(5, 1)" data-crops="P5" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(5, 2)" data-crops="P5" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(5, 3)" data-crops="P5" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(5, 4)" data-crops="P5" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(5, 5)" data-crops="P5" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(5, 6)" data-crops="P5" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                    <div class="plantations" id="plantation6" onclick="recolectCrops(6)">
                        <img src="../images/wheat.png" onclick="plantations(6, 1)" data-crops="P6" alt="Wheat" class="wheat" width="30px" height="30px"> 
                        <img src="../images/corn.png" onclick="plantations(6, 2)" data-crops="P6" alt="Corn" class="corn" width="30px" height="30px"> 
                        <img src="../images/soyBean.png" onclick="plantations(6, 3)" data-crops="P6" alt="Soy Bean" class="soyBean" width="30px" height="30px"> 
                        <img src="../images/sugarCane.png" onclick="plantations(6, 4)" data-crops="P6" alt="Sugar Cane" class="sugarCane" width="30px" height="30px"> 
                        <img src="../images/carrot.png" onclick="plantations(6, 5)" data-crops="P6" alt="Carrot" class="carrot" width="30px" height="30px"> 
                        <img src="../images/pumpkin.png" onclick="plantations(6, 6)" data-crops="P6" alt="Pumpkin" class="pumpkin" width="30px" height="30px"> 
                    </div>
                </div>

                <div id="gameCoops">
                    <div class="coops" id="coop1" onclick="recolectCrops(7)">
                        <img src="../images/chicken.png" onclick="coops(1)" alt="Chicken Coop" id="chicken"> 
                    </div>
                    <div class="coops" id="coop2" onclick="recolectCrops(8)">
                        <img src="../images/cow.png" onclick="coops(2)" alt="Cow Pasture" id="cow"> 
                    </div>
                    <div class="coops" id="coop3" onclick="recolectCrops(9)">
                        <img src="../images/pig.png" onclick="coops(3)" alt="Pig Pen" id="pig"> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>