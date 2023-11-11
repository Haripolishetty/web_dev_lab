<?php
// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', true);

// Log initial message for debugging
error_log('process.php is running');

// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the expected keys are present in $_POST
    $expectedKeys = array('firstName', 'lastName', 'address', 'phone'); 

    if (count(array_diff($expectedKeys, array_keys($_POST))) === 0) {
        // Retrieve user information from the form
        $userName = $_POST['firstName'] . '_' . $_POST['lastName'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        // Hand-coded user details
        $userDetails = array(
            'john_doe' => array(
                'firstName' => 'har',
                'lastName' => 'sai',
                'address' => 'road',
                'phone' => '555'
            ),
            'jane_smith' => array(
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'address' => '456 Oak Ave',
                'phone' => '555-5678'
            ),
            // Add more user details as needed
        );

        // Log user details for debugging
        error_log('User details: ' . print_r($userDetails, true));

        // Check if the user exists in the hand-coded records
        if (array_key_exists($userName, $userDetails)) {
            // User found, set a cookie or session variable
            setcookie('user_info', json_encode($userDetails[$userName]), time() + (86400 * 30), '/');
            // Alternatively, you can use a session variable
            // session_start();
            // $_SESSION['user_info'] = $userDetails[$userName];

            // Log success message for debugging
            error_log('User found. Redirecting to index.php');

            // Redirect to a page to display user information
            header('Location: index.php');
            exit();
        } else {
            // Log error message for debugging
            error_log('User not found. Please check the entered details.');

            // Display an error message
            echo 'User not found. Please check the entered details.';
        }
    } else {
        // Log error message for debugging
        error_log('Incomplete form data received.');

        // Display an error message
        echo 'Incomplete form data received. Please fill in all required fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with PHP</title>
</head>
<body>
    <form action="" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>



