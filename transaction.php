<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Section 1: Load subcategories
  if (isset($_POST['category']) && !isset($_POST['categoryName'])) {
    $category = $_POST['category'];
    $conn = mysqli_connect("localhost", "root", "", "Agriculture_inventory_management");
    if (!$conn) {
      echo "<p class='text-red-500'>Database connection failed.</p>";
      exit;
    }

    $sql = ($category === "income") ? "SELECT * FROM income" : (($category === "expense") ? "SELECT * FROM expense" : "");
    if (!$sql) {
      echo "<p class='text-yellow-500'>Invalid category selected.</p>";
      exit;
    }

    $result = $conn->query($sql);

    echo "<form id='form2' class='space-y-4'>";
    echo "<label for='categoryName'>Select Subcategory</label>";
    echo "<select name='categoryName' required class='w-full p-2 rounded-lg bg-gray-700 text-white'>";
    echo "<option disabled selected>Select Subcategory</option>";
    while ($row = $result->fetch_assoc()) {
      $name = htmlspecialchars($row['categoryName']);
      echo "<option value='$name'>$name</option>";
    }
    echo "</select>";
    echo "<input type='hidden' name='category' value='" . htmlspecialchars($category) . "'>";
    echo "<button type='submit' class='bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg'>Submit</button>";
    echo "</form>";
    exit;
  }

  // Section 2: Load dynamic input form in Section 4
  if (isset($_POST['categoryName']) && isset($_POST['category'])) {
    $categoryName = $_POST['categoryName'];
    $category = $_POST['category'];

    echo "<form class='space-y-4 dynamic' id='addForm'>";
    echo "<h2 class='text-lg font-semibold text-white mb-2'>Enter Details for <span class='text-yellow-300'>" . htmlspecialchars($categoryName) . "</span></h2>";
    echo "<input type='date' id='date' name='date' required class='w-full p-2 rounded-lg bg-gray-700 text-white' />";
    echo "<input type='number' id='quantity' name='quantity' placeholder='Enter Quantity' required class='w-full p-2 rounded-lg bg-gray-700 text-white' />";
    echo "<input type='number' id='rate' name='rate' placeholder='Enter Rate' required class='w-full p-2 rounded-lg bg-gray-700 text-white' />";
    echo "<input type='hidden' name='categoryName' value='" . htmlspecialchars($categoryName) . "'>";
    echo "<input type='hidden' name='category' value='" . htmlspecialchars($category) . "'>";
    echo "<p class='text-yellow-400' id='extraTotal'></p>";
    echo "<button type='submit' class='w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg mt-2'>Add</button>";
    echo "</form>";
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transaction</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php include 'header.php'; ?>
<body class="bg-[#fdf9ec] text-black min-h-screen px-6 py-10">
  <!-- <center>
  <div class="mt-4">
    <a href="index.php"
      class="inline-flex items-center text-blue-400 hover:text-blue-300 font-semibold transition-all duration-200">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Go Back
    </a>
  </div>
  </center> -->
  <div class="grid grid-cols-1 lg:grid-cols-2 py-3 gap-8">

    <!-- Section 1 -->
    <div class="bg-gray-800 bg-red-400 p-6 rounded-2xl shadow-lg">
      <h2 class="text-2xl font-bold mb-4 text-center">Section 1: Select Category</h2>
      <form id="form1" class="space-y-4">
        <label for="category">Choose Category</label>
        <select id="category" name="category" required class="w-full p-3 rounded-lg bg-gray-700 text-white">
          <option value="" disabled selected>-- Select --</option>
          <option value="income">Income</option>
          <option value="expense">Expense</option>
        </select>
        <button type="submit"
          class="w-full bg-green-600 hover:bg-green-700 py-3 rounded-lg font-semibold">Submit</button>
      </form>
    </div>


    <!-- Section 3 -->
    <div id="section3" class="bg-red-400 p-6 rounded-2xl shadow-lg min-h-[200px] hidden">
      <!-- <h2 class="text-xl font-semibold mb-2">Section 3: Subcategory Form</h2> -->
      <div id="calendar3" class="text-center"></div>
    </div>

    <!-- Section 4 -->
    <div id="section4" class="bg-red-400 p-6 rounded-2xl shadow-lg min-h-[200px] hidden">
      <!-- <h2 class="text-xl font-semibold mb-2">Section 4: Enter Details</h2> -->
      <div id="calendar4" class="text-center"></div>
    </div>

    <!-- Section 5 -->
    <div id="section5" class="bg-red-400 p-6 rounded-2xl shadow-lg min-h-[200px] hidden">
      <!-- <h2 class="text-xl font-semibold mb-2">Section 5: Final Results</h2> -->
      <div id="calendar5" class="text-center"></div>
    </div>

  </div>

  <script>
    function generateCalendar(sectionId) {
      const today = new Date();
      const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
      const day = today.getDate();
      const month = monthNames[today.getMonth()];
      const year = today.getFullYear();
      document.getElementById(sectionId).innerHTML = `${month} ${day}, ${year}`;
    }

    generateCalendar("calendar3");
    generateCalendar("calendar5");

    document.getElementById("form1").addEventListener("submit", function (e) {
      e.preventDefault();
      const formData = new FormData(this);
      fetch("", {
        method: "POST",
        body: formData
      })
        .then(res => res.text())
        .then(data => {
          const section3 = document.getElementById("section3");
          section3.innerHTML = data;
          section3.classList.remove("hidden");
          attachForm2Handler();
        });
    });

    function attachForm2Handler() {
      const form2 = document.getElementById("form2");
      if (form2) {
        form2.addEventListener("submit", function (e) {
          e.preventDefault();
          const formData = new FormData(this);
          fetch("", {
            method: "POST",
            body: formData
          })
            .then(res => res.text())
            .then(data => {
              const section4 = document.getElementById("section4");
              section4.innerHTML = data;
              section4.classList.remove("hidden");
              attachLiveCalculator();
            });
        });
      }
    }

    function attachLiveCalculator() {
      const qty = document.getElementById("quantity");
      const rate = document.getElementById("rate");
      const totalElement = document.getElementById("extraTotal");
      const form = document.getElementById("addForm");

      if (!qty || !rate || !totalElement || !form) return;

      function handleLiveCalculation() {
        const quantity = parseFloat(qty.value);
        const rateValue = parseFloat(rate.value);
        const total = quantity * rateValue;

        if (!isNaN(total)) {
          totalElement.innerText = 'Total Amount: ₹ ' + total.toFixed(2);
        } else {
          totalElement.innerText = 'Please enter valid numbers.';
        }
      }

      qty.addEventListener("input", handleLiveCalculation);
      rate.addEventListener("input", handleLiveCalculation);

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch("insert_data.php", {
          method: "POST",
          body: formData
        })
          .then(res => res.text())
          .then(data => {
            document.getElementById("calendar5").innerHTML = data;
            document.getElementById("section5").classList.remove("hidden");
          });
      });
    }
  </script>
</body>

</html>

<?php include "product_dataDetails.php" ?>