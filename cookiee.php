<?php
// Sample user details stored on the server
$storedUserDetails = [
    'John' => ['lastName' => 'Doe', 'address' => '123 Main St', 'phone' => '555-1234'],
    // Add more users as needed
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Check if the user exists in the stored details
    if (isset($storedUserDetails[$firstName]) && $storedUserDetails[$firstName]['lastName'] === $lastName) {
        // Set cookies for user information
        setcookie('userName', "$firstName $lastName", time() + 3600, '/'); // Cookie expires in 1 hour

        // Redirect to display.php to show the user's information
        header("Location: disp.php");
        exit();
    } else {
        // User not found, you can handle this case accordingly
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
</head>
<body>
    <h2>User Information Form</h2>

    <?php if (isset($message)) : ?>
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="cookiee.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
