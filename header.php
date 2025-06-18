<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Sidebar Navbar</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #fefae0;
    }

    header {
      background-color: #fefae0;
      width: 100%;
      padding: 1rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      position: relative;
      z-index: 10;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
    }

    .nav-links {
      display: flex;
      gap: 0.5rem;
    }

    .nav-links a {
      text-decoration: none;
      color: black;
      font-weight: 600;
      font-size: 1rem;
      padding: 0.5rem 1.2rem;
      border-radius: 2rem;
      transition: background-color 0.3s ease-in-out;
    }

    .nav-links a:hover {
      background-color: #cbbc49;
    }

    .nav-links a.active-link {
      background-color: #cbbc49;
      color: white;
    }

    .hamburger {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
    }

    .hamburger span {
      height: 3px;
      width: 25px;
      background: #333;
      border-radius: 5px;
      transition: all 0.3s ease-in-out;
    }

    /* Mobile Sidebar Style */
    @media screen and (max-width: 768px) {
      .hamburger {
        display: flex;
      }

      .nav-links {
        flex-direction: column;
        position: fixed;
        top: 0;
        right: -100%;
        height: 100%;
        width: 70%;
        background-color: #fefae0;
        padding-top: 4rem;
        padding-left: 1rem;
        transition: right 0.3s ease-in-out;
        box-shadow: -2px 0 10px rgba(0,0,0,0.2);
        z-index: 9;
      }

      .nav-links.active {
        right: 0;
      }

      .nav-links a {
        padding: 1rem;
        width: 100%;
        border-radius: 0;
        font-size: 1.1rem;
        border-bottom: 1px solid #ddd;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="navbar">
    <h2 style="font-weight: bold;">AgriManage</h2>

    <div class="hamburger" onclick="toggleMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav class="nav-links" id="navMenu">
      <a href="index.php">Home</a>
      <a href="productCategoryForm.php">Product Category</a>
      <a href="productIncomeForm.php">Income</a>
      <a href="productExpenseForm.php">Expense</a>
      <a href="Transaction.php">Transaction</a>
      <a href="Report.php">Reports</a>
      <a href="logout.php">Logout</a>
    </nav>
  </div>
</header>

<script>
  function toggleMenu() {
    const menu = document.getElementById("navMenu");
    menu.classList.toggle("active");
  }

  // Highlight active nav link
  const links = document.querySelectorAll('.nav-links a');

  links.forEach(link => {
    link.addEventListener('click', () => {
      // Remove active-link from all
      links.forEach(item => item.classList.remove('active-link'));

      // Add to clicked link
      link.classList.add('active-link');

      // Optional: close sidebar after click (on mobile)
      document.getElementById("navMenu").classList.remove("active");
    });
  });
</script>

</body>
</html>
