<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .card {
            border-radius: 1rem;
            /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            /* Shadow effect */
            padding: 2rem;
            /* Padding inside the card */
        }

        .button {
            margin-top: 1rem;
            padding: 0.5rem;
        }

        .select {
            padding: .5rem;
        }
        
        @media only screen and (max-width: 600px) {
            .card {
                width: 100%;
                position: absolute;
                top: 30%;
            }

            .select {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
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

    $category = $_POST['category'];

    if ($category == "income") {
        $sql = "SELECT * FROM income";
    } else if ($category == "expense") {
        $sql = "SELECT * FROM expense";
    } else {
        echo "<br>Invalid Category";
    }
    //    $sql = "SELECT *FROM income";
    //echo $sql;
    $result = $conn->query($sql);


    echo "<br><br><br><div class='flex flex-col sm:flex-row justify-center  gap-10 p-6 min-h-screen'>";
    echo "<div>";

    echo "<form action='quantityandAmountOfProduct.php' method='POST' class='card flex flex-col sm:flex-row items-center gap-4 bg-gray-800 p-4 rounded-xl shadow-lg'>";
    echo "<select name='categoryName' class='select bg-gray-900 text-white rounded-lg py-2 px-4 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500'>";
    echo "<option disabled selected class='text-gray-400'>Select Category</option>";

    while ($data = $result->fetch_assoc()) {
        $CId = $data["categoryName"];
        echo "<option name='$CId' class='bg-gray-900 text-white py-2 px-4'>" . $CId . "</option>";
    }

    echo "</select>";
    echo "<input type='hidden' name='category' value='$category'>";
    echo "<input type='submit' value='Submit' class='select bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-lg transition duration-300'>";
    echo "</form>";

    echo "</div>";
    echo "</div>";


    mysqli_close($conn);
    echo "<br><br>"
        ?>
</body>

</html>