<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button'])) {
  $button = $_POST['button'];

  $conn = mysqli_connect("localhost", "root", "", "Agriculture_inventory_management");
  if (!$conn) {
    echo "<p class='text-red-500'>Database connection failed.</p>";
    exit;
  }

  function renderTable($result, $columns) {
    echo "<div class='overflow-x-auto'>";
    echo "<table class='w-full table-auto text-sm text-left border border-gray-700'>";
    echo "<thead class='bg-red-800 text-white'><tr>";
    foreach ($columns as $col) {
      echo "<th class='border px-3 py-2'>{$col}</th>";
    }
    echo "</tr></thead><tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr class='hover:bg-red-800'>";
      foreach ($columns as $key => $col) {
        $value = isset($row[$key]) ? $row[$key] : '';
        if ($key === 'date') {
          $formatted = date("d-m-Y", strtotime($value));
          echo "<td class='border px-3 py-2'>{$formatted}</td>";
        } elseif (in_array($key, ['rate', 'total'])) {
          echo "<td class='border px-3 py-2'>₹ {$value}</td>";
        } else {
          echo "<td class='border px-3 py-2'>{$value}</td>";
        }
      }
      echo "</tr>";
    }

    echo "</tbody></table></div>";
  }

  switch ($button) {
    case '1':
      $sql = "SELECT 
                ROW_NUMBER() OVER (ORDER BY DATE, CATEGORY) AS SrNo,
                DATE,
                CATEGORY,
                SUM(TOTAL) AS TOTAL_AMOUNT
              FROM PRODUCT_DATA
              GROUP BY DATE, CATEGORY
              ORDER BY DATE";
      $result = mysqli_query($conn, $sql);
      mysqli_num_rows($result) > 0
        ? renderTable($result, ['SrNo' => 'Sr No', 'DATE' => 'Date', 'CATEGORY' => 'Category', 'TOTAL_AMOUNT' => 'Total Amount'])
        : print("<p class='text-yellow-400'>No data found.</p>");
      break;

    case '2':
      $selected_date = $_POST['selected_date'] ?? '';
      if (!$selected_date) {
        echo "<p class='text-red-400'>Please select a date.</p>";
        break;
      }

      $sql = "SELECT 
                ROW_NUMBER() OVER (ORDER BY id) AS SrNo,
                date,
                category,
                subcategory,
                quantity,
                rate,
                total
              FROM product_data
              WHERE date = '$selected_date'";
      $result = mysqli_query($conn, $sql);
      mysqli_num_rows($result) > 0
        ? renderTable($result, [
            'SrNo' => 'Sr No',
            'date' => 'Date',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'quantity' => 'Quantity',
            'rate' => 'Rate',
            'total' => 'Amount'
          ])
        : print("<p class='text-yellow-400'>No records found for selected date.</p>");
      break;

    case '3':
      $selected_month = $_POST['selected_month'] ?? '';
      if (!$selected_month) {
        echo "<p class='text-red-400'>Please select a month.</p>";
        break;
      }

      $start_date = $selected_month . '-01';
      $end_date = date('Y-m-t', strtotime($start_date));

      $sql = "SELECT 
                ROW_NUMBER() OVER (ORDER BY date) AS SrNo,
                date,
                category,
                subcategory,
                quantity,
                rate,
                total
              FROM product_data
              WHERE date BETWEEN '$start_date' AND '$end_date'";
      $result = mysqli_query($conn, $sql);
      mysqli_num_rows($result) > 0
        ? renderTable($result, [
            'SrNo' => 'Sr No',
            'date' => 'Date',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'quantity' => 'Quantity',
            'rate' => 'Rate',
            'total' => 'Amount'
          ])
        : print("<p class='text-yellow-400'>No records found for selected month.</p>");
      break;

    case '4':
      $start_date = $_POST['start_date'] ?? '';
      $end_date = $_POST['end_date'] ?? '';

      if (!$start_date || !$end_date) {
        echo "<p class='text-red-400'>Please select both start and end dates.</p>";
        break;
      }

      $sql = "SELECT 
                ROW_NUMBER() OVER (ORDER BY date) AS SrNo,
                date,
                category,
                subcategory,
                quantity,
                rate,
                total
              FROM product_data
              WHERE date BETWEEN '$start_date' AND '$end_date'";
      $result = mysqli_query($conn, $sql);
      mysqli_num_rows($result) > 0
        ? renderTable($result, [
            'SrNo' => 'Sr No',
            'date' => 'Date',
            'category' => 'Category',
            'subcategory' => 'Subcategory',
            'quantity' => 'Quantity',
            'rate' => 'Rate',
            'total' => 'Amount'
          ])
        : print("<p class='text-yellow-400'>No records found for selected date range.</p>");
      break;

    default:
      echo "<p class='text-red-500'>Unknown request.</p>";
  }

  mysqli_close($conn);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Report Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
  *{
    color: black;
  }
</style>

<body class="bg-[#fdf9ec] text-white p-8">

<?php include 'header.php'; ?>

  <div class="py-10 flex flex-wrap md:flex-nowrap">

    <!-- Sidebar -->
    <div class="w-full md:w-1/4 bg-[#f33434] p-4 rounded-lg mb-4 md:mb-0">
      <h2 class="text-2xl font-semibold mb-6">Report Options</h2>

      <button onclick="sendRequest(1)" class="w-full bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg mb-4">
        Daily Summary
      </button>

      <div class="mb-4">
        <input type="date" id="selectedDate" class="text-black px-2 py-1 rounded mb-2 w-full" />
        <button onclick="sendDateWiseRequest()" class="w-full bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg">
          Get Records of Date
        </button>
      </div>

      <div class="mb-4">
        <input type="month" id="monthInput" class="text-black px-2 py-1 rounded mb-2 w-full" />
        <button onclick="sendMonthRequest()" class="w-full bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg">
          Get Records of Month
        </button>
      </div>

      <!-- New Button 4 for Date Range -->
      <div class="mb-4">
        <input type="date" id="startDate" class="text-black px-2 py-1 rounded mb-2 w-full" />
        <input type="date" id="endDate" class="text-black px-2 py-1 rounded mb-2 w-full" />
        <button onclick="sendDateRangeRequest()" class="w-full bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
          Get Records for Date Range
        </button>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="w-full md:w-3/4 p-6 ml-4 bg-[#f33434] rounded-lg">
      <div id="result" class="mt-6 text-sm text-center text-yellow-300"></div>
    </div>
  </div>

  <script>
    function sendRequest(buttonNumber) {
      const formData = new FormData();
      formData.append("button", buttonNumber);

      fetch("", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        document.getElementById("result").innerHTML = data;
      });
    }

    function sendDateWiseRequest() {
      const date = document.getElementById("selectedDate").value;
      if (!date) {
        alert("Please select a date.");
        return;
      }

      const formData = new FormData();
      formData.append("button", 2);
      formData.append("selected_date", date);

      fetch("", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        document.getElementById("result").innerHTML = data;
      });
    }

    function sendMonthRequest() {
      const month = document.getElementById("monthInput").value;
      if (!month) {
        alert("Please select a month.");
        return;
      }

      const formData = new FormData();
      formData.append("button", 3);
      formData.append("selected_month", month);

      fetch("", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        document.getElementById("result").innerHTML = data;
      });
    }

    function sendDateRangeRequest() {
      const startDate = document.getElementById("startDate").value;
      const endDate = document.getElementById("endDate").value;

      if (!startDate || !endDate) {
        alert("Please select both start and end dates.");
        return;
      }

      const formData = new FormData();
      formData.append("button", 4);
      formData.append("start_date", startDate);
      formData.append("end_date", endDate);

      fetch("", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(data => {
        document.getElementById("result").innerHTML = data;
      });
    }
  </script>
</body>
</html>
