<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Completion Certificate</title>
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
        <h2>Internship Completion Certificate</h2>

        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="dob">Internship Date:</label>
        <input type="date" id="dob" name="idates" required>

        <label for="place-of-birth">Date of Issue:</label>
        <input type="date" id="place-of-birth" name="dateofi" required>

        <label for="father-name">Duration:</label>
        <input type="number" id="father-name" name="duration" required>

        <label for="mother-name">Domain:</label>
        <input type="text" id="mother-name" name="domain" required>

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
    $idates = $_POST["idates"];
    $dateofi = $_POST["dateofi"];
    $duration = $_POST["duration"];
    $domain = $_POST["domain"];
    $registration_number = $_POST["registration_number"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO icomcert (full_name, gender, idates, dateofi, duration, domain, registration_number)
            VALUES ('$full_name', '$gender', '$idates', '$dateofi', '$duration', '$domain','$registration_number')";
}
?>