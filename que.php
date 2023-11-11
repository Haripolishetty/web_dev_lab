<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
</head>
<body>
    <h2>User Information Form</h2>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Store form data in session variables
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["phone"] = $_POST["phone"];
        $_SESSION["designation"] = $_POST["designation"];

        // Redirect to a page to display the submitted information
        header("Location: display.php");
        exit();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
