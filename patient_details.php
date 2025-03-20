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

// Fetch patient details
$sql = "SELECT * FROM PATIENT"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient List</title>
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
        <h2>Patient List</h2> 
        <table>
            <tr>
                <th>Patient ID</th> 
                <th>Name</th>
                <th>Phone</th>
                <th>Blood Received</th> 
                <th>Address</th>
                <th>Receiving Date</th> 
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['PATIENT_ID']}</td> 
                            <td>{$row['PATIENT_NAME']}</td> 
                            <td>{$row['PATIENT_PH']}</td> 
                            <td>{$row['RECEIVED_BLOOD']}</td> 
                            <td>{$row['PATIENT_ADDRESS']}</td> 
                            <td>{$row['RECEIVED_DATE']}</td> 
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No patients found</td></tr>"; 
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
