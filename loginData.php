<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Agriculture_inventory_management";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        echo "<BR>Invalid Database or path";
    }

    $Fuser = $_POST['username'];
    $Fpassword = $_POST['password'];

    $sql = "SELECT *FROM register";
        //echo $sql;
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 

        $found = false; // Flag to check if user exists

        while ($data = $result->fetch_assoc()) { 
            $username = $data["userName"];
            $password = $data["Spassword"];

            if ($Fuser == $username && $Fpassword == $password) {
                $found = true; 
                    include "index.php";
                break;
            } 
        }
        if (!$found) {
            echo "<div style='color: red; text-align: center; '>";
            echo "<br><center><b>Please Enter Correct Email and Password</b></center>";
            include "login.php";
            echo "</div>";
        } 
        }

    mysqli_close($conn);
?>
