<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change if different
$password = "root"; // Change if needed
$dbname = "bbms"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donor details
$sql = "SELECT * FROM DONOR";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
            text-align: center;
        }
        .container {
            margin: 50px auto;
            width: 80%;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Donor List</h2>
        <table>
            <tr>
                <th>Donor ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Blood Group</th>
                <th>Weight</th>
                <th>DOB</th>
                <th>Doctor ID</th>
                <th>Blood Given</th>
                <th>Address</th>
                <th>Donation Date</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['DONOR_ID']}</td>
                            <td>{$row['DONOR_NAME']}</td>
                            <td>{$row['DONOR_PH']}</td>
                            <td>{$row['DONOR_BLOOD_GROUP']}</td>
                            <td>{$row['WEIGHT']}</td>
                            <td>{$row['DOB']}</td>
                            <td>{$row['DOCTOR_ID']}</td>
                            <td>{$row['UNIT_OF_BLOOD_GIVEN']}</td>
                            <td>{$row['DONOR_ADDRESS']}</td>
                            <td>{$row['DONATION_DATE']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No donors found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
