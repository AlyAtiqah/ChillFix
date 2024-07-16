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
    $service = isset($_POST['service']) ? mysqli_real_escape_string($conn, $_POST['service']) : '';
    $quantity = isset($_POST['quantity']) ? mysqli_real_escape_string($conn, $_POST['quantity']) : '';
    $aircond = isset($_POST['aircond']) ? mysqli_real_escape_string($conn, $_POST['aircond']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $date = isset($_POST['date']) ? mysqli_real_escape_string($conn, $_POST['date']) : '';
    $time = isset($_POST['time']) ? mysqli_real_escape_string($conn, $_POST['time']) : '';

    // Validate form data
    if (!empty($service) && !empty($quantity) && !empty($aircond) && !empty($address) && !empty($date) && !empty($time)) {
        // Prepare the SQL statement
        $data = "INSERT INTO booking (name, service, quantity, aircond, address, date, time) VALUES ('$name', '$service', '$quantity', '$aircond', '$address', '$date', '$time')";

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

