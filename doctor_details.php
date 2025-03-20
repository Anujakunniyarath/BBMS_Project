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

// Fetch doctor details
$sql = "SELECT DOCTOR_ID, DOCTOR_NAME, DOCTOR_PH FROM DOCTOR";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
            text-align: center;
        }
        .container {
            margin: 50px auto;
            width: 60%;
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
        <h2>Doctor List</h2>
        <table>
            <tr>
                <th>Doctor ID</th>
                <th>Doctor Name</th>
                <th>Doctor Phone</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['DOCTOR_ID']}</td>
                            <td>{$row['DOCTOR_NAME']}</td>
                            <td>{$row['DOCTOR_PH']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No doctors found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
