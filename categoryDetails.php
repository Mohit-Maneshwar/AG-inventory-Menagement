
<!-- Program to Insert a record into mysql table -->
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "agriculture_inventory_management";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            echo "<BR>Invalid Database or path";
        }
        
        $sql = "SELECT *FROM category";
        //echo $sql;
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            // Output data of each row 
            echo"<br><br>";
            echo"<center><h2>Category Details</h2><br><br>";
            echo"<table border=2 class='border border-gray-300' width='60%'>";
            echo"<tr class='border border-gray-300'>";
            echo"<th class='border border-gray-300'>Category Code</th>";
            echo"<th class='border border-gray-300'>Category Name</th>";
            echo"</tr>";
            while($row = $result->fetch_assoc()) { 
                //    $row = $result->fetch_assoc();
                echo "<tr class='border border-gray-300'><td align='center' class='border border-gray-300'>".$row["categoryCode"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["categoryName"]."</td></tr>";
            } 
            print("</table></center><br><br><br>");
        }else {
            echo "<BR>Error in Select Query";
        }
        mysqli_close($conn);
        ?>
