<?php
$conn = mysqli_connect("localhost", "root", "", "chillfix_db");

// Check connection
if (!$conn) {
    ?>
    <script>alert("Failed to connect to database.");</script>
    <?php
    die();
}

// Assuming form submission handling for login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from database
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        ?>
        <script>
        alert("Login successful.");
        window.location.href = "Home.html"; // Redirect to home page
        </script>
        <?php
        exit;
    } else {
        ?>
        <script>alert("Invalid username or password.");
        window.location.href = "Log In User.html";
        </script>
        <?php
    }
}

mysqli_close($conn);
?>
