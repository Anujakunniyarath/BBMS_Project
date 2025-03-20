<?php include 'locl.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(255, 255, 255);
        }
        .container {
            display: flex;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgb(207, 12, 77);
            width: 60%;
        }
        .image {
            flex: 1;
            padding: 10px;
        }
        .image img {
            width: 100%;
            border-radius: 8px;
        }
        .form-container {
            flex: 1;
            padding: 20px;
            
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
        }
        h2{
            color:red;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color:rgb(207, 12, 77);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color:rgb(207, 18, 65);
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="image">
            <img src="patientform.jpeg" alt="Blood Donation">
        </div>
        <div class="form-container">
            <h2>Patient Registration</h2>
            <form action="patient_process.php" method="POST">
                <label>Patient ID:</label>
                <input type="text" name="Patient_id" required>

                <label>Patient Name:</label>
                <input type="text" name="Patient_name" required>

                <label>Phone Number:</label>
                <input type="text" name="Patient_ph" required>

                <label>Blood Group Received:</label>
                <select name="Received_blood" required>
                    <?php
                    $query = "SELECT blood_type FROM stock";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['blood_type']}'>{$row['blood_type']}</option>";
                    }
                    ?>
                </select>

                <label>Address:</label>
                <input type="text" name="Patient_address" required>

                <label>Received Date:</label>
                <input type="date" name="Received_date" required>

                <label>Units of Blood Received:</label>
                <input type="number" name="Unit_of_blood_received" min="1" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
