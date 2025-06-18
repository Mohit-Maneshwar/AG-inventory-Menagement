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
        
        $userName = $_POST['userName'];
        $mobileNo = $_POST['mobileNo'];
        $password = $_POST['Spassword'];

        $sql = "INSERT INTO register (userName,mobileNo,Spassword) VALUES('$userName','$mobileNo','$password')";
        
        if(mysqli_query($conn, $sql)){
            include"login.php"; 
        }
        mysqli_close($conn);
        ?>