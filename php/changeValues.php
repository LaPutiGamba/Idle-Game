<?php
	include "connectDB.php";

    function cropInField($numPlantation, $cropSelected) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "UPDATE USERS SET cropInField" . $numPlantation . " = $cropSelected WHERE username = '" . $_SESSION['userConnection'] . "';";

        // If doesn't go well the sql sentence we get the error.
        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        // Close connection.
        mysqli_close($conn);
    }

    function timestampFieldCrops($numPlantation, $timestampValue) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "UPDATE USERS SET timeFieldCrop" . $numPlantation . " = $timestampValue WHERE username = '" . $_SESSION['userConnection'] . "';";

        // If doesn't go well the sql sentence we get the error.
        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        // Close connection.
        mysqli_close($conn);
    }

    function checkingStatusPlantation() {
        global $servername, $username, $password, $dbname;
        $finalValue = "";

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());

        // SELECT user field crops timestamps.
	    $sql = "SELECT timeFieldCrop1, timeFieldCrop2, timeFieldCrop3, timeFieldCrop4, timeFieldCrop5, timeFieldCrop6, cropInField1, cropInField2, cropInField3, cropInField4, cropInField5, cropInField6 FROM USERS WHERE username = '" . $_SESSION['userConnection'] . "';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Saving the current timestamp.
            $currentTime = time();

            $time = array_fill(1, 6, null);;

            for ($i = 1; $i < 7; $i++)
            switch ($row["cropInField" . $i]) {
                case 1:
                    $time[$i] = 60;
                    break;
                case 2:
                    $time[$i] = 120;
                    break;
                case 3:
                    $time[$i] = 180;
                    break;
                case 4:
                    $time[$i] = 240;
                    break;
                case 5:
                    $time[$i] = 300;
                    break;
                case 6:
                    $time[$i] = 360;
                    break;
                default:
                    break;
            }
            
            for ($i = 1; $i < 7; $i++) {
                if ($row["timeFieldCrop" . $i] != NULL) {
                    if ($row["timeFieldCrop" . $i] == 0) {
                        $finalValue .= "" . $i . $row["cropInField" . $i] . "0, ";

                        $time[$i] = null;
                    } else if (($currentTime - $row["timeFieldCrop" . $i]) >= $time[$i]) {
                        $finalValue .= "" . $i . "1, "; 

                        $time[$i] = null;

                        // UPDATE user data.
                        $sql = "UPDATE USERS SET timeFieldCrop" . $i . " = 0 WHERE username = '" . $_SESSION['userConnection'] . "';";

                        // If doesn't go well the sql sentence we get the error.
                        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        $finalValue .= "" . $i . $row["cropInField" . $i] . "2, ";

                        $time[$i] = null;
                    }
                } else {
                    $finalValue .= "" . $i . "4, ";

                    $time[$i] = null;
                }
            }
            echo $finalValue;
        } else {
            echo "0 results";
        }
        
        // Close connection.
        mysqli_close($conn);
    }

    function materialUpdate($selectedPlantation, $selectedMaterial) {
        global $servername, $username, $password, $dbname;

        switch($selectedMaterial) { 
            case 1:
                $material = "wheat";
                break;
            case 2:
                $material = "corn";
                break;
            case 3:
                $material = "soyBean";
                break;
            case 4:
                $material = "sugarCane";
                break;
            case 5:
                $material = "carrot";
                break;
            case 6:
                $material = "pumpkin";
                break;
            case 7:
                $material = "eggs";
                break;
            case 8:
                $material = "milk";
                break;
            case 9:
                $material = "bacon";
                break;
            default:
                break;
        }

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());

        // SELECT user materials.
	    $sql = "SELECT " . $material . " FROM USERS WHERE username = '" . $_SESSION['userConnection'] . "';";
        $result = mysqli_query($conn, $sql);

        // UPDATE the materials.
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            // UPDATE in database user materials.
            if ($selectedMaterial < 7) {
                $result = $row["" . $material . ""] + 5;
                $sql = "UPDATE USERS SET " . $material . " = " . $result . ", timeFieldCrop" . $selectedPlantation . " = NULL, cropInField" . $selectedPlantation . " = NULL WHERE username = '" . $_SESSION['userConnection'] . "';";
            }
            if ($selectedMaterial > 6) {
                if ($material == "eggs") $result = $row["" . $material . ""] + 5;
                if ($material == "milk") $result = $row["" . $material . ""] + 3;
                if ($material == "bacon") $result = $row["" . $material . ""] + 2;
                $sql = "UPDATE USERS SET " . $material . " = " . $result . ", timeCoops" . $selectedPlantation . " = NULL WHERE username = '" . $_SESSION['userConnection'] . "';";
            }
            $result = mysqli_query($conn, $sql);
        }

        // Close connection.
        mysqli_close($conn);
    }

    function timestampCoops($numCoop, $timestampValue) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "UPDATE USERS SET timeCoops" . $numCoop . " = $timestampValue WHERE username = '" . $_SESSION['userConnection'] . "';";

        // If doesn't go well the sql sentence we get the error.
        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        // Close connection.
        mysqli_close($conn);
    }

    function timestampCoopsSet($numCoop) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "SELECT timeCoops" . $numCoop . " FROM USERS WHERE username = '" . $_SESSION['userConnection'] . "';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row["timeCoops" . $numCoop] == NULL) echo "NULL";
        }

        // Close connection.
        mysqli_close($conn);
    }

    function checkingStatusCoop() {
        global $servername, $username, $password, $dbname;
        $finalValue = "";

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());

        // SELECT user field crops timestamps.
	    $sql = "SELECT timeCoops1, timeCoops2, timeCoops3 FROM USERS WHERE username = '" . $_SESSION['userConnection'] . "';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Saving the current timestamp.
            $currentTime = time();

            $time[0] = 20; // 120
            $time[1] = 20; // 240
            $time[2] = 20; // 360
            
            for ($i = 1; $i < 4; $i++) {
                if ($row["timeCoops" . $i] != NULL) {
                    if ($row["timeCoops" . $i] == 0) {
                        $finalValue .= "" . $i . "0, ";

                        $time[$i] = null;
                    } else if (($currentTime - $row["timeCoops" . $i]) >= $time[($i - 1)]) {
                        $finalValue .= "" . $i . "1, "; 

                        $time[$i] = null;

                        // UPDATE user data.
                        $sql = "UPDATE USERS SET timeCoops" . $i . " = 0 WHERE username = '" . $_SESSION['userConnection'] . "';";

                        // If doesn't go well the sql sentence we get the error.
                        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        $finalValue .= "" . $i . "2, ";

                        $time[$i] = null;
                    }
                } else {
                    $finalValue .= "" . $i . "4, ";

                    $time[$i] = null;
                }
            }
            echo $finalValue;
        } else {
            echo "0 results";
        }
        
        // Close connection.
        mysqli_close($conn);
    }

    function updateHUD() {
		global $servername, $username, $password, $dbname;
        $finalValue = "";

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());

        // Select USER data.
        $sql = "SELECT coins, wheat, corn, soyBean, sugarCane, carrot, pumpkin, eggs, milk, bacon FROM USERS WHERE username = '" . $_POST['username'] . "';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Set session variables.
            $finalValue .= $row["coins"] . ", ";
            $finalValue .= $row["wheat"] . ", ";
            $finalValue .= $row["corn"] . ", ";
            $finalValue .= $row["soyBean"] . ", ";
            $finalValue .= $row["sugarCane"] . ", ";
            $finalValue .= $row["carrot"] . ", ";
            $finalValue .= $row["pumpkin"] . ", ";
            $finalValue .= $row["eggs"] . ", ";
            $finalValue .= $row["milk"] . ", ";
            $finalValue .= $row["bacon"] . ", ";

            echo $finalValue;
        }

        // Close connection.
        mysqli_close($conn);
	}
?>