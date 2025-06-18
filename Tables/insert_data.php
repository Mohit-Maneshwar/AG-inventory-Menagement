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
            
        $sql = "CREATE TABLE product_data (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category VARCHAR(100),
            subcategory VARCHAR(100),
            date DATE,
            quantity FLOAT,
             rate FLOAT,
            total FLOAT
        )";
        
        
        if(mysqli_query($conn, $sql)){
            echo"Done";
        }
        mysqli_close($conn);
    ?>