
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
        
        $sql = "SELECT *FROM expense";
        //echo $sql;
        $result = $conn->query($sql); 
        if ($result->num_rows > 0) { 
            // Output data of each row 
            echo"<br><br>";
            echo"<center><h2>Expense Details</h2><br><br>";
            echo"<table border=2  width='90%'>";
            echo"<tr>";
            echo"<th>Category Code</th>";
            echo"<th>Category Name</th>";
            echo"<th>Product Expense</th>";
            echo"</tr>";
            while($row = $result->fetch_assoc()) { 
                //    $row = $result->fetch_assoc();
                echo "<tr><td align='center'>".$row["categoryCode"]."</td>";
                echo "<td align='center'>".$row["categoryName"]."</td>";
                echo "<td align='center'>".$row["productExpense"]."</td></tr>";
            } 
            print("</table></center><br><br><br>");
        }else {
            echo "<BR>Error in Select Query";
        }
        mysqli_close($conn);
        ?>
