<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1000px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .form-container {
            width: 50%;
            padding: 30px;
            background-color: #fff;
        }

        h2 {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            color: #d32f2f;
        }

        input, select {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #d32f2f;
            border-radius: 5px;
            outline: none;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #d32f2f;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #b71c1c;
        }

        .image-container {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffe6e6;
        }

        .image-container img {
            width: 80%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Blood Donation Form</h2>
            <form action="donor_submit.php" method="POST">
                <label>Donor Name:</label>
                <input type="text" name="name" required>

                <label>Phone:</label>
                <input type="text" name="phone" required>

                <label for="donor_id">Donor ID:</label>
                <input type="text" name="donor_id" required>


                <label>Blood Group:</label>
                <select name="blood_group" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>

                <label>Weight (kg):</label>
                <input type="number" name="weight" required>

                <label>Date of Birth:</label>
                <input type="date" name="dob" required>

                <label>Doctor:</label>
                <select name="doctor_id" required>
                    <option value="">Select Doctor</option>
                    <option value="AM104">Dr. Anjali Menon</option>
                    <option value="AN542">Dr. Arjun Nair</option>
                    <option value="PS731">Dr. Priya Sharma</option>
                    <option value="RK257">Dr. Rajesh Kumar</option>
                    <option value="SV389">Dr. Sneha Verma</option>
                </select>

                <label>Units of Blood Given:</label>
                <input type="number" name="unit" required>

                <label>Address:</label>
                <input type="text" name="address" required>

                <label>Donation Date:</label>
                <input type="date" name="donation_date" required>


                <button type="submit">Submit</button>

            

            </form>
        </div>
        
        <!-- Right-side image -->
        <div class="image-container">
            <img src="donorimage.jpeg" alt="Blood Donation">
        </div>
    </div>
</body>
</html>
