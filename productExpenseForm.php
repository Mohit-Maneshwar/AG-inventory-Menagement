<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>productExpense</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<?php include"header.php"; ?>
<div class="form-section">
    <form action="productExpense.php" method="POST" class="form-contact">
        <div>
            <label>Category Name :</label>
            <input require type="text" name="categoryName">
        </div>
        <div>
            <label>Expense :</label>
            <input require type="text" name="productExpense">
        </div>
        <div>
            <button class="putOn">Put On</button>
        </div>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br>
<?php include"expenseDetails.php"; ?>

<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- GSAP Animation Script -->
<script>
    // Animate form section on page load
    gsap.from(".form-section", {
        duration: 1.2,
        opacity: 0,
        y: 50,
        ease: "power2.out"
    });

    // Button hover effect
    const button = document.querySelector(".putOn");
    button.addEventListener("mouseenter", () => {
        gsap.to(button, { scale: 1.1, duration: 0.2 });
    });
    button.addEventListener("mouseleave", () => {
        gsap.to(button, { scale: 1, duration: 0.2 });
    });
</script>
</body>
</html>