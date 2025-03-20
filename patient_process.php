<?php
include 'locl.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['Patient_id'];
    $patient_name = $_POST['Patient_name'];
    $patient_ph = $_POST['Patient_ph'];
    $received_blood = $_POST['Received_blood'];
    $patient_address = $_POST['Patient_address'];
    $received_date = $_POST['Received_date'];
    $units_received = $_POST['Unit_of_blood_received'];

    // Check if blood stock is sufficient
    $check_query = "SELECT availability FROM stock WHERE blood_type = '$received_blood'";
    $result = mysqli_query($con, $check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row && $row['availability'] >= $units_received) {
        // Insert patient record
        $insert_query = "INSERT INTO Patient (Patient_id, Patient_name, Patient_ph, Received_blood, Patient_address, Received_date, Unit_of_blood_received) 
                         VALUES ('$patient_id', '$patient_name', '$patient_ph', '$received_blood', '$patient_address', '$received_date', '$units_received')";
        if (mysqli_query($con, $insert_query)) {
            // Update blood stock
            $update_query = "UPDATE stock SET availability = availability - $units_received WHERE blood_type = '$received_blood'";
            mysqli_query($con, $update_query);
            echo "<script>alert('Patient registered and stock updated successfully!'); window.location.href='patient_form.php';</script>";
        } else {
            echo "<script>alert('Error in registration!'); window.location.href='patient_form.php';</script>";
        }
    } else {
        echo "<script>alert('Insufficient blood stock!'); window.location.href='patient_form.php';</script>";
    }
}
?>
