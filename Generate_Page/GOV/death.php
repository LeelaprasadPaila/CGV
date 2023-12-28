<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Certificate Generation</title>
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
        <h2>Death Certificate Form</h2>

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

        <label for="place-of-birth">Date of Death:</label>
        <input type="date" id="place-of-birth" name="death" required>

        <label for="father-name">Cause of Death</label>
        <input type="text" id="father-name" name="cause" required>

        <label for="father-name">Relationship to the Deceased:</label>
        <input type="text" id="father-name" name="deceased" required>

        <label for="mother-name">Medical License Number:(Optional)</label>
        <input type="text" id="mother-name" name="medicalnum">

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

session_start();



if (isset($_POST['submit'])) {
    $full_name = $_POST["full_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $death = $_POST["death"];
    $cause = $_POST["cause"];
    $deceased = $_POST["deceased"];
    $medicalnum = $_POST["medicalnum"];
    $registration_number = $_POST["registration_number"];
    $_SESSION['registration_number'] = $_POST["registration_number"];

    // Function to generate a random registration number
    function generateRegistrationNumber($length = 8, $conn)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $registrationNumber = '';

        // Loop until a unique number is found
        do {
            for ($i = 0; $i < $length; $i++) {
                $registrationNumber .= $characters[rand(0, strlen($characters) - 1)];
            }

            // Check if the number already exists in the database
            $checkQuery = "SELECT COUNT(*) FROM birth WHERE registration_number = '$registrationNumber'";
            $result = $conn->query($checkQuery);

            // Use fetchColumn() instead of fetch_row()
            $existingCount = $result->fetchColumn();
        } while ($existingCount > 0);

        return $registrationNumber;
    }

    generateRegistrationNumber(8, $conn);
    // SQL query to insert data into the table



    $sql = "INSERT INTO death (full_name, gender, dob, death, cause, deceased, medicalnum, registration_number)
    VALUES ('$full_name', '$gender', '$dob', '$death', '$cause', '$deceased', '$medicalnum', '$registration_number')";

    if ($conn->query($sql) == true) {
        echo '<script>
       alert("Data succussfully insterted");
 </script>';
        header("location:deathcert.php");
    } else {
        echo "Error";
    }
}
?>