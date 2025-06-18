<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Calculate Total</title>
  <style>
    .card {
      background-color: #2d3748;
      /* Darker background for the card */
      border-radius: 1rem;
      /* Rounded corners */
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      /* Shadow effect */
      padding: 2rem;
      /* Padding inside the card */
    }

    input,
    button {
      margin-top: 1rem;
      padding: 0.5rem;
    }
  </style>

  <script defer>
    function calculateTotal() {
      const quantity = parseFloat(document.getElementById("quantity").value);
      const rate = parseFloat(document.getElementById("rate").value);
      const total = quantity * rate;

      if (!isNaN(total)) {
        document.getElementById("total").innerText = "Total Amount: ₹ " + total.toFixed(2);
      } else {
        document.getElementById("total").innerText = "Please enter valid numbers.";
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
  <?php include "header.php"; ?>
  <br>
  <br>
  <div class="text-white flex justify-center ">


    <div class="card bg-gray-800 p-6 rounded-2xl shadow-lg w-full max-w-md flex gap-4 flex-col">
      <h2 class="text-2xl font-bold mb-4 text-center">Calculate Amount</h2>
      <div class="space-y-4 flex gap-4 flex-col">
        <input id="quantity" type="number" placeholder="Enter Quantity"
          class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-green-500 outline-none">

        <input id="rate" type="number" placeholder="Enter Rate"
          class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:ring-2 focus:ring-green-500 outline-none">

        <button onclick="calculateTotal()"
          class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg transition duration-300">
          Calculate
        </button>
        <?php
        $categoryName = $_POST['categoryName'];
        $category = $_POST['category'];

        ?>

        <p id="total" class="mt-4 text-lg text-center text-yellow-400 font-medium"></p>
      </div>
    </div>
  </div>
</body>

</html>