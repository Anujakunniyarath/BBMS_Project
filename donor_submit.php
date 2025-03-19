<?php
include 'locl.php'; // Ensure this contains the correct database connection setup

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $donor_id = mysqli_real_escape_string($con, $_POST['donor_id']); // Taking Donor_id from form input
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $blood_group = mysqli_real_escape_string($con, $_POST['blood_group']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $doctor_id = mysqli_real_escape_string($con, $_POST['doctor_id']);
    $unit = mysqli_real_escape_string($con, $_POST['unit']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $donation_date = mysqli_real_escape_string($con, $_POST['donation_date']);

    // Insert into Donor table
    $donor_query = "INSERT INTO Donor (Donor_id, Donor_name, Donor_ph, Donor_blood_group, Weight, DOB, Doctor_id, unit_of_blood_given, Donor_address, Donation_date) 
                    VALUES ('$donor_id', '$name', '$phone', '$blood_group', '$weight', '$dob', '$doctor_id', '$unit', '$address', '$donation_date')";

    if (mysqli_query($con, $donor_query)) {
        // Check if the blood type already exists in stock
        $stock_check_query = "SELECT * FROM stock WHERE blood_type = '$blood_group'";
        $result = mysqli_query($con, $stock_check_query);

        if (mysqli_num_rows($result) > 0) {
            // Update stock if blood type exists
            $stock_update_query = "UPDATE stock SET availability = availability + $unit WHERE blood_type = '$blood_group'";
            mysqli_query($con, $stock_update_query);
        } else {
            // Insert new stock if blood type doesn't exist
            $stock_insert_query = "INSERT INTO stock (blood_type, availability) VALUES ('$blood_group', '$unit')";
            mysqli_query($con, $stock_insert_query);
        }

        echo "<script>alert('Donor registered successfully!'); window.location.href='donor_form.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid Request'); window.history.back();</script>";
}

mysqli_close($con);
?>
