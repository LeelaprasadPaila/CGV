<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Certificate Confirmation</title>
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
        <h2>Marriage Certificate Form</h2>

        <label for="full-name">Groom Name:</label>
        <input type="text" id="full-name" name="groom" required>
        <label for="full-name">Bride Name:</label>
        <input type="text" id="full-name" name="bride" required>

        <label for="dob">Date of Marriage:</label>
        <input type="date" id="dob" name="dom" required>

        <label for="place-of-Marriage">Place of Marriage:</label>
        <input type="text" id="place-of-Marriage" name="place_of_Marriage" required>

        <label for="father-name">Groom Parent's Name:(Father/Mother)</label>
        <input type="text" id="father-name" name="groomp" required>

        <label for="mother-name">Bride Parent's Name:(Father/Mother)</label>
        <input type="text" id="mother-name" name="bridep" required>

        <label for="registration-number">Registration Number:</label>
        <input type="number" id="registration_number" name="registration_number" required>

        <input type="submit" value="Generate Certificate" name="submit">
    </form>


</body>

</html><?php
$db_name = "mysql:host=localhost; dbname=cgv_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);

session_start(); // Start the session

if (isset($_POST['submit'])) {
    $groom = $_POST["groom"];
    $bride = $_POST["bride"];
    $dom = $_POST["dom"];
    $place_of_Marriage = isset($_POST["place_of_Marriage"]) ? $_POST["place_of_Marriage"] : "";
    $bridep = $_POST["bridep"];
    $groomp = $_POST["groomp"];
    $registration_number = $_POST["registration_number"];
    $_SESSION['registration_number'] = $registration_number;

    // SQL query to insert data into the table
    $sql = "INSERT INTO marriage (groom, bride, dom, place_of_Marriage, bridep, groomp, registration_number)
            VALUES ('$groom', '$bride', '$dom', '$place_of_Marriage', '$bridep', '$groomp', '$registration_number')";

    if ($conn->query($sql) == true) {
        echo '<script>
            alert("Data successfully inserted");
        </script>';
        header("location:marrcert.php");
        exit(); // Added exit to stop further execution
    } else {
        echo "Error";
    }
}
?>
