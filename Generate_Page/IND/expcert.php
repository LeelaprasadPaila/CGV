<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .confirmation {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        p {
            margin-bottom: 10px;
        }
            

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FFA500;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Experience Certificates</h2>

        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="registration-number">Ref no:</label>
        <input type="number" id="refno" name="refno" required>

        <label for="dob">Date:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="place-of-birth">Years of Experience</label>
        <input type="number" id="place-of-birth" name="place_of_birth" required>

        <label for="father-name">Master/Domain:</label>
        <input type="text" id="father-name" name="father_name" required>

        <label for="mother-name">Company (or) Organization:</label>
        <input type="text" id="mother-name" name="mother_name" required>

        <label for="registration-number">Registration Number:</label>
        <input type="number" id="registration-number" name="registration_number" required>

        <input type="submit" value="Generate Certificate" name="submit">
    </form>


 
</body>
</html>

<?php

$db_name = "mysql:host=localhost; dbname=cgv_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);


        if (isset($_POST['submit'])) {
            $full_name = $_POST["full_name"];
            $gender = $_POST["gender"];
            $refno=$_POST["refno"];
            $dob = $_POST["dob"];
            $place_of_birth = $_POST["place_of_birth"];
            $father_name = $_POST["father_name"];
            $mother_name = $_POST["mother_name"];
            $registration_number = $_POST["registration_number"];

            // SQL query to insert data into the table
            $sql = "INSERT INTO expcert (full_name, gender, refno, dob, place_of_birth, father_name, mother_name, registration_number)
            VALUES ('$full_name', '$gender', '$refno', '$dob', '$place_of_birth', '$father_name', '$mother_name', '$registration_number')";

            // Execute the query
            if ($conn->query($sql)==true) {
                echo "Data inserted successfully";
            } else {
                echo "Error";
            }
        }
        ?>