<?php
include 'locl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Stock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Blood Stock Details</h2>
    <table>
        <tr>
            <th>Blood Type</th>
            <th>Availability (Units)</th>
        </tr>
        <?php
        $query = "SELECT * FROM stock";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['blood_type']}</td><td>{$row['availability']}</td></tr>";
        }
        ?>
    </table>
    
    <h3>Search Blood Donation & Reception</h3>
    <form action="search.php" method="POST">
        <label for="blood">Select Blood Type:</label>
        <select name="blood" required>
            <?php
            $bloodQuery = "SELECT DISTINCT blood_type FROM stock";
            $bloodResult = mysqli_query($con, $bloodQuery);
            while ($row = mysqli_fetch_assoc($bloodResult)) {
                echo "<option value='{$row['blood_type']}'>{$row['blood_type']}</option>";
            }
            ?>
        </select>
        <button type="submit">Go</button>
    </form>
</body>
</html>
