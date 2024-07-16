<?php
$conn = mysqli_connect("localhost", "root", "", "chillfix_db");

// Check connection
if (!$conn) {
    ?>
    <script>alert("Failed to connect to database.");</script>
    <?php
    die();
}

// Assuming form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm-password'];

    // Insert data into database
    $query = "INSERT INTO user VALUES('', '$username', '$email', '$password', '$confirmpassword')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        ?>
        <script>
        alert("Your data has been successfully submitted.");
        window.location.href = "Log In User.html"; // Redirect to login page
        </script>
        <?php
        exit;
    } else {
        ?>
        <script>alert("Failed to submit data.");
        window.location.href = "Log In User.html";
        </script>
        <?php
    }
}
?>
