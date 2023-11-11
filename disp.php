<?php
// Sample user details stored on the server
$storedUserDetails = [
    'John' => ['lastName' => 'Doe', 'address' => '123 Main St', 'phone' => '555-1234'],
    // Add more users as needed
];

// Check if the cookie is set
if (isset($_COOKIE['userName'])) {
    $userName = $_COOKIE['userName'];

    // Display the user's information in a table
    echo "<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>User Information</title>
        <style>
            table {
                border-collapse: collapse;
                width: 50%;
                margin-top: 20px;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>";

    echo "<h2>User Information</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Address</th><th>Phone</th></tr>";

    // Check if the user exists in the stored details
    if (isset($storedUserDetails[$userName])) {
        $lastName = $storedUserDetails[$userName]['lastName'];
        $address = $storedUserDetails[$userName]['address'];
        $phone = $storedUserDetails[$userName]['phone'];

        echo "<tr>";
        echo "<td>$userName $lastName</td>";
        echo "<td>$address</td>";
        echo "<td>$phone</td>";
        echo "</tr>";
    } else {
        // Handle the case where user details are not found
        echo "<tr><td colspan='3'>User information not available.</td></tr>";
    }

    echo "</table>";
    echo "</body></html>";
} else {
    // Cookie not set, handle this case accordingly
    echo "User information not available.";
}
?>
