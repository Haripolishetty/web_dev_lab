<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', true);

// Check if the cookie 'user_info' is set
if (isset($_COOKIE['user_info'])) {
    // Decode the JSON data from the cookie
    $userInfo = json_decode($_COOKIE['user_info'], true);

    // Display user information in a table
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Information</title>
    </head>
    <body>
        <h1>User Information</h1>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
            <tr>
                <td><?= $userInfo['firstName'] ?></td>
                <td><?= $userInfo['lastName'] ?></td>
                <td><?= $userInfo['address'] ?></td>
                <td><?= $userInfo['phone'] ?></td>
            </tr>
        </table>
    </body>
    </html>
    <?php
} else {
    // If the cookie is not set, display an error message
    echo 'User information not found. Please fill out the form first.';
}
?>
