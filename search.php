<?php
include 'locl.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = $_POST['blood'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Blood Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Blood Donation & Reception Details for <?php echo htmlspecialchars($blood); ?></h2>
    
    <h3>Donors</h3>
    <table>
        <tr>
            <th>Donor Name</th>
            <th>Donation Date</th>
            <th>Units Donated</th>
        </tr>
        <?php
        $donorQuery = "SELECT Donor_name, Donation_date, unit_of_blood_given FROM Donor WHERE Donor_blood_group = '$blood'";
        $donorResult = mysqli_query($con, $donorQuery);
        while ($row = mysqli_fetch_assoc($donorResult)) {
            echo "<tr><td>{$row['Donor_name']}</td><td>{$row['Donation_date']}</td><td>{$row['unit_of_blood_given']}</td></tr>";
        }
        ?>
    </table>
    
    <h3>Patients</h3>
    <table>
        <tr>
            <th>Patient Name</th>
            <th>Received Date</th>
            <th>Units Received</th>
        </tr>
        <?php
        $patientQuery = "SELECT Patient_name, Received_date, Unit_of_blood_received FROM Patient WHERE Received_blood = '$blood'";
        $patientResult = mysqli_query($con, $patientQuery);
        while ($row = mysqli_fetch_assoc($patientResult)) {
            echo "<tr><td>{$row['Patient_name']}</td><td>{$row['Received_date']}</td><td>{$row['Unit_of_blood_received']}</td></tr>";
        }
        ?>
    </table>
</body>
</html>
