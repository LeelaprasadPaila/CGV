<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Certificate Confirmation</title>
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
        <h2>Vaccination Certificate Form</h2>

        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>


        <label for="full-name">Age:</label>
        <input type="number" id="full-name" name="age" required>

        <label for="place-of-birth">Aadhar Number:</label>
        <input type="number" id="place-of-birth" name="aadhar" required>

        <label for="father-name">Vaccination Name:</label>
        <input type="text" id="father-name" name="vacc" required>

        <label for="mother-name">Date of Dose</label>
        <input type="date" id="mother-name" name="dod" required>

        <label for="registration-number">Next Dose:</label>
        <input type="date" id="registration-number" name="ndose" required>

        <label for="mother-name">Vaccination by:</label>
        <input type="text" id="mother-name" name="vby" required>

        <label for="registration-number">Vaccination place:</label>
        <input type="text" id="registration-number" name="vplace" required>

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
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $aadhar = $_POST["aadhar"];
    $vacc = $_POST["vacc"];
    $dod = $_POST["dod"];
    $ndose = $_POST["ndose"];
    $vby = $_POST["vby"];
    $vplace = $_POST["vplace"];
    $registration_number = $_POST["registration_number"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO vacccination (full_name, gender, dob, age, aadhar, vacc, dod, ndose, vby, vplace, registration_number)
            VALUES ('$full_name', '$gender', '$dob', ' $age', '$aadhar', '$vacc',' $dod', '$ndose', '$vby', '$vplace', '$registration_number')";

        // Execute the query
        if ($conn->query($sql)==true) {
            echo "Data inserted successfully";
        } else {
            echo "Error";
        }
}
?>