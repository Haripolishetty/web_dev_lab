<?php
session_start();

// Check if session variables are set
if (
    isset($_SESSION["username"]) &&
    isset($_SESSION["email"]) &&
    isset($_SESSION["phone"]) &&
    isset($_SESSION["designation"])
) {
    // Display the submitted information
    echo "<h2>User Information</h2>";
    echo "<p><strong>Username:</strong> " . $_SESSION["username"] . "</p>";
    echo "<p><strong>Email:</strong> " . $_SESSION["email"] . "</p>";
    echo "<p><strong>Phone:</strong> " . $_SESSION["phone"] . "</p>";
    echo "<p><strong>Designation:</strong> " . $_SESSION["designation"] . "</p>";

    // Clear session variables after displaying the information
    session_unset();
    session_destroy();
} else {
    echo "No data submitted.";
}
?>
