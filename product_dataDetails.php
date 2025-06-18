
    <!-- Program to Insert a record into mysql table-->
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
        
        $sql = "SELECT *FROM product_data";
        //echo $sql;
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            // Output data of each row 
            echo"<br><br>";
            echo"<center><h2>Records</h2><br><br>";
            echo"<table border=2 class='border border-gray-300' width='90%'>";
            echo"<tr class='border border-gray-300'>";
            echo"<th class='border border-gray-300'>ID</th>";
            echo"<th class='border border-gray-300'>Category</th>";
            echo"<th class='border border-gray-300'>SubCategory</th>";
            echo"<th class='border border-gray-300'>Date</th>";
            echo"<th class='border border-gray-300'>Quantity</th>";
            echo"<th class='border border-gray-300'>Rate</th>";
            echo"<th class='border border-gray-300'>Total</th>";
            echo"</tr>";
            while($row = $result->fetch_assoc()) { 
                //    $row = $result->fetch_assoc();
                echo "<tr class='border border-gray-300'><td align='center' class='border border-gray-300'>".$row["id"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["category"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["subcategory"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["date"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["quantity"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["rate"]."</td>";
                echo "<td align='center' class='border border-gray-300'>".$row["total"]."</td></tr>";
            } 
            print("</table></center><br><br><br>");
        }else {
            echo "<BR>Error in Select Query";
        }
        mysqli_close($conn);
        ?>
