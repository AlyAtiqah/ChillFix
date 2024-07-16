<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "chillfix_db");

// Check connection
if (!$conn) {
    echo "Database connection failed";
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';
    $phonenumber = isset($_POST['phonenumber']) ? mysqli_real_escape_string($conn, $_POST['phonenumber']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';

    // Validate form data
    if (!empty($name) && !empty($phonenumber) && !empty($email) && !empty($username) && !empty($password) && !empty($address)) {
        // Prepare the SQL statement
        $data = "INSERT INTO profile (name, phonenumber, email, username, password, address) VALUES ('$name', '$phonenumber', '$email', '$username', '$password', '$address')";

        // Execute the query
        if (mysqli_query($conn, $data)) {
            echo "Your data has been submitted successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Please fill in all fields";
    }
}

// Close the database connection
mysqli_close($conn);
?>
