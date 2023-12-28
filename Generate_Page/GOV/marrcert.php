<?php
// Database configuration
$db_name = "mysql:host=localhost; dbname=cgv_db";
$username = "root";
$password = "";

$conn = new PDO($db_name, $username, $password);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Certificate Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .certificate {
            width: 800px;
            margin: 50px auto;
            border: 5px solid #000;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .body {
            font-size: 18px;
            line-height: 1.5;
        }

        .details {
            margin-top: 30px;
            display: flex;
            justify-content: center; /* Center the groom and bride names */
        }

        .detail-item {
            width: 45%;
            text-align: left;
        }

        .detail-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .footer {
            margin-top: 50px;
            font-size: 14px;
            text-align: justify;
            color: #555; /* Updated footer text color */
        }

        .image {
            width: 150px;
            height: auto;
            float: right;
            margin-top: 50px;
        }
    </style>

</head>

<body>
    <div class="certificate">
        <div class="header">
            <br>
            Marriage Certificate
        </div>
        <div class="body">
            <?php
            session_start();
            $registration_number = $_SESSION['registration_number'];
            $stmt = $conn->prepare("SELECT * FROM marriage WHERE registration_number = $registration_number");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            $conn = null;
            ?>
            This is to certify that on the <?php echo $row['dom']; ?>, at <?php echo $row['place_of_Marriage']; ?>, <?php echo $row['groom']; ?>, son of <?php echo $row['groomp']; ?>, and <?php echo $row['bride']; ?>, daughter of <?php echo $row['bridep']; ?>, were joined in marriage.
            <br><br>
            <!-- Additional information can be added here -->
        </div>
        <div class="details">
            <div class="detail-item">
                <div class="detail-label">Groom:</div>
                <span><?php echo $row['groom']; ?></span>
            </div>
            <div class="detail-item">
                <div class="detail-label">Bride:</div>
                <span><?php echo $row['bride']; ?></span>
            </div>
        </div>
        <div class="footer">
            This certificate is issued in accordance with the laws of India. It is a true and accurate record of the marriage of <?php echo $row['groom']; ?> and <?php echo $row['bride']; ?>.
        </div>
    </div>
</body>

</html>
