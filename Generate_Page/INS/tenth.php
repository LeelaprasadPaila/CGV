<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenth Certificate</title>
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
    <form action="" id="registrationForm" method="post">
        <h2>Tenth Certificate</h2>

        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required>

        <label for="school-name">School Name:</label>
        <input type="text" id="school-name" name="schname" required>

        <label for="father-name">Father Name:</label>
        <input type="text" id="father-name" name="father_name" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="completion-date">Completion Date:</label>
        <input type="text" id="completion-date" name="completion_date" required>

        <label for="academic-year">Academic Year:</label>
        <input type="text" id="academic-year" name="academic_year" required>

        

        <input type="submit" value="Generate Certificate" name="submit" onclick="generateRegistrationNumber()">


        <p id="registrationNumber"></p>
    </form>

    <script>
        function generateRegistrationNumber() {
            const fullName = document.getElementById("full-name").value;
            const timestamp = new Date().getTime();
            const randomNum = Math.floor(Math.random() * 10000);
            const registrationNumber = `REG-${timestamp}-${randomNum}`;

            document.getElementById("registrationNumber").innerText = `Registration Number: ${registrationNumber}`;
        }
    </script>

<?php
$db_name = "mysql:host=localhost; dbname=cgv_db";
$username = "root";
$password = "";
$conn = new PDO($db_name, $username, $password);

if (isset($_POST['submit'])) {
    $full_name = $_POST["full_name"];
    $schname = $_POST["schname"];
    $father_name = $_POST["father_name"];
    $address = $_POST["address"];
    $completion_date = $_POST["completion_date"];
    $academic_year = $_POST["academic_year"];

    $sql = "INSERT INTO tenth (full_name, schname, father_name, address, completion_date, academic_year)
            VALUES (:full_name, :schname, :father_name, :address, :completion_date, :academic_year)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':schname', $schname); // Fix parameter name here
    $stmt->bindParam(':father_name', $father_name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':completion_date', $completion_date);
    $stmt->bindParam(':academic_year', $academic_year);

    
        header("location:tencert.php");
    }
 
?>


</body>

</html>
