<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "Agriculture_inventory_management");
    if (!$conn) {
        echo "<p class='text-red-500'>❌ Database connection failed.</p>";
        exit;
    }

    $category = mysqli_real_escape_string($conn, $_POST['category'] ?? '');
    $subcategory = mysqli_real_escape_string($conn, $_POST['categoryName'] ?? '');
    $date = mysqli_real_escape_string($conn, $_POST['date'] ?? '');
    $quantity = floatval($_POST['quantity'] ?? 0);
    $rate = floatval($_POST['rate'] ?? 0);
    $total = $quantity * $rate;

    $sql = "INSERT INTO Product_Data (category, subcategory, date, quantity, rate, total)
            VALUES ('$category', '$subcategory', '$date', $quantity, $rate, $total)";

    if (mysqli_query($conn, $sql)) {
        echo "
        <p class='text-green-400 font-semibold'>✅ Entry Saved Successfully!</p>
        <ul class='text-white text-left'>
          <li><strong>Category:</strong> $category</li>
          <li><strong>Subcategory:</strong> $subcategory</li>
          <li><strong>Date:</strong> $date</li>
          <li><strong>Quantity:</strong> $quantity</li>
          <li><strong>Rate:</strong> ₹$rate</li>
          <li><strong>Total:</strong> ₹" . number_format($total, 2) . "</li>
        </ul>";
    } else {
        echo "<p class='text-red-500'>❌ Failed to insert data.</p>";
    }
}
?>
