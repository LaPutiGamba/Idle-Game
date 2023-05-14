<?php
	include "connectDB.php";

    function cropInField($numPlantation, $cropSelected) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "UPDATE USERS SET cropInField" . $numPlantation . " = $cropSelected WHERE username = '" . $_SESSION['userConnection'] . "'";

        // If doesn't go well the sql sentence we get the error.
        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        // Close connection.
        mysqli_close($conn);
    }

    function timestampChange($numPlantation, $timestampValue) {
        global $servername, $username, $password, $dbname;

        // Create connection.
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection.
        if (!$conn) die("Connection failed: " . mysqli_connect_error());
        
        // UPDATE user data.
        $sql = "UPDATE USERS SET timeFieldCrop" . $numPlantation . " = $timestampValue WHERE username = '" . $_SESSION['userConnection'] . "'";

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
	    $sql = "SELECT timeFieldCrop1, timeFieldCrop2, timeFieldCrop3, timeFieldCrop4, timeFieldCrop5, timeFieldCrop6, cropInField1, cropInField2, cropInField3, cropInField4, cropInField5, cropInField6 FROM USERS WHERE username = '" . $_SESSION['userConnection'] . "'";
        $result = mysqli_query($conn, $sql);

        // Saving the current timestamp.
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
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
            }
            
            for ($i = 1; $i < 7; $i++) {
                if ($row["timeFieldCrop" . $i] != NULL) {
                    if (($currentTime - $row["timeFieldCrop" . $i]) >= $time[$i]) {
                        $finalValue .= "" . $i . ", "; 

                        $time[$i] = null;

                        // UPDATE user data.
                        $sql = "UPDATE USERS SET timeFieldCrop" . $i . " = NULL, cropInField" . $i . " = NULL WHERE username = '" . $_SESSION['userConnection'] . "'";

                        // If doesn't go well the sql sentence we get the error.
                        if (!mysqli_query($conn, $sql)) echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    $finalValue .= "" . $i . "0, ";

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
?>        
