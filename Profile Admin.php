<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHILLFIX</title>
    <link rel="stylesheet" href="style .css">
    <style>
    table {
            border-collapse: colLapse;
            width: 100%;
            font-family: 'Times New Roman', Times, serif; 
            font-size: 15px;
            text-align: Left;
    }
    th{
        background-color: #F5CBA7;
        color: white;
    }
       
        tr:nth-child(even) {background-color: #fff;}

    .footer {
        background-color: #F5CBA7;
        color: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 140px;
        padding: 20px 0;
        margin-left: -283px;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 70px;
    }
    
    .footer p {
        margin: 0;
    }

    </style>
	<div class="header">
		<p><b>ChillFix</b>  <br /><br />Aircond Repair & Service</p>
		<img src="org3.jpg"width="140" height="80" alt="ChillFix logo">
    </div>
    <div class="navigation">
        <ul>
            <li><a href="Home Admin.html">Home</a></li>
            <li><a href="Service & Price Admin.html">Service & Price</a></li>
            <li><a href="Booking History.php">Booking History</a></li>
            <li><a href="About Us Admin.html">About Us</a></li>   
            <li><a href="Profile Admin.php">Profile</a></li>
            <li><a href="Log Out.html">Log Out</a></li>    
        </ul>
    </div>
    <div class="container">
        <h2>Profile Form</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Username</th>
                <th>Password</th>
                <th>Address</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "chillfix_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, name, phonenumber, username, password, address FROM profile";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["phonenumber"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
        </form>
        <div class="footer">
            <img src="logo pic.jpg"width="150" height="80">
            <p><b>No Tel</b>  <br /><br />012 34567890</p>
            <p><b>Email</b> <br /><br />chillfix@gmail.com</p>
            <p><b>Address</b> <br /><br />18, Jalan Metafasa U16/5, Taman Bukit<br /> Subang, 40160, Shah Alam, Selangor</p>
        </div>
</body>
</html>