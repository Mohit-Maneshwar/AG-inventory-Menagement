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
            
        $sql = "CREATE TABLE income (
            categoryCode INT AUTO_INCREMENT PRIMARY KEY,
            categoryName VARCHAR(100) NOT NULL,
            productIncome VARCHAR(100) NOT NULL
        )";
        
        
        if(mysqli_query($conn, $sql)){
            echo"Done";
        }
        mysqli_close($conn);
    ?>