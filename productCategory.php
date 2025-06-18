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
        
        $categoryName = $_POST['categoryName'];

        $sql = "INSERT INTO category (categoryName) VALUES('$categoryName')";
        
        if(mysqli_query($conn, $sql)){
        }
        mysqli_close($conn);
        ?>
<?php include"productCategoryForm.php"; ?>