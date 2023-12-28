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
    <title>Death Certificate Template</title>
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
            justify-content: space-between;
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
        }

        .image {
            width: 150px;
            height: auto;
            float: right;
            margin-top: 50px;
        }
    </style>
<!-- Add this in the head section of your HTML file -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>

<body>
    <div class="certificate">
        <div class="header">
            <br>
            Death Certificate
        </div>
        <div class="body">
            <?php
            session_start();
            $registration_number = $_SESSION['registration_number'];
            $stmt = $conn->prepare("SELECT * FROM death WHERE registration_number = $registration_number");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            $conn = null;
            ?>
            This is to certify that <?php echo $row['full_name']; ?>, <?php echo $row['gender']; ?>, born on <?php echo $row['dob']; ?>, has passed away on <?php echo $row['death']; ?>.
            <br><br>
            The cause of death is <?php echo $row['cause']; ?>.
            <br><br>
            The deceased was identified by medical record number <?php echo $row['medicalnum']; ?>.
        </div>
        <div class="details">
          
            <div class="detail-item">
                <!-- Additional details can be added here -->
            </div>
        </div>
        <div class="footer">
            This certificate is issued in accordance with the laws of India. It is a true and accurate record of the death of the individual named above.
        </div>
    </div>
    <!-- Add this button where you want to place the download button -->
<button id="downloadBtn" >Download Certificate</button>

</body>
<!-- Add this script at the end of your body or in a separate script file -->
<script>
    // Function to capture HTML content and trigger download
    function downloadCertificate() {
        // Select the certificate container or the element you want to capture
        const certificateContainer = document.querySelector('.certificate');

        // Use html2canvas to capture the content as an image
        html2canvas(certificateContainer).then(function (canvas) {
            // Convert the canvas to a data URL
            const dataUrl = canvas.toDataURL('image/png'); // Change to 'image/jpeg' for JPG

            // Create a temporary link element
            const a = document.createElement('a');
            a.href = dataUrl;
            a.download = 'certificate.png'; // Change the filename and extension as needed
            a.click();
        });
    }

    // Attach the function to the button click event
    document.getElementById('downloadBtn').addEventListener('click', downloadCertificate);
</script>


</html>