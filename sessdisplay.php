<?php
session_start();

// Sample user details stored on the server
$storedUserDetails = [
    'John Doe' => ['address' => '123 Main St', 'phone' => '555-1234'],
    // Add more users as needed
];

// Check if the session variable is set
if (isset($_SESSION['userName'])) {
    $userName = $_SESSION['userName'];

    // Display the user's information in a table
    echo "<h2>User Information</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Address</th><th>Phone</th></tr>";

    // Check if the user exists in the stored details
    if (isset($storedUserDetails[$userName])) {
        echo "<tr>";
        echo "<td>$userName</td>";
        echo "<td>{$storedUserDetails[$userName]['address']}</td>";
        echo "<td>{$storedUserDetails[$userName]['phone']}</td>";
        echo "</tr>";
    } else {
        // Handle the case where user details are not found
        echo "<tr><td colspan='3'>User information not available.</td></tr>";
    }

    echo "</table>";

    // Clear the session variable after displaying the information
    unset($_SESSION['userName']);
} else {
    // Session variable not set, handle this case accordingly
    echo "User information not available.";
}
?>

