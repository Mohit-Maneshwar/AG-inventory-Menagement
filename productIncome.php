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
        $categoryIncome = $_POST['categoryIncome'];

        $sql = "INSERT INTO income (categoryName,productIncome) VALUES('$categoryName','$categoryIncome')";
        
        if(mysqli_query($conn, $sql)){
        }
        mysqli_close($conn);
        ?>
<?php include"productIncomeForm.php"; ?>