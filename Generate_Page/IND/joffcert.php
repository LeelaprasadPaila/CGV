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
    <title>Job Offer Letter Template</title>
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

</head>

<body>
    <div class="certificate">
        <div class="header">
            <br>
            Job Offer Letter
        </div>
        <div class="body">
            This is to certify that <?php echo $row['full_name']; ?> has been offered a position based on their qualifications and performance in the interview.
            <br><br>
            The job details are as follows:
            <br><br>
            Position: [Job Position]<br>
            Department: [Job Department]<br>
            Start Date: [Job Start Date]<br>
            Salary: [Job Salary]
        </div>
        <div class="details">
            <div class="detail-item">
                <div class="detail-label">Father's Name:</div>
                <span><?php echo $row['father_name']; ?></span>
            </div>
            <div class="detail-item">
                <div class="detail-label">Mother's Name:</div>
                <span><?php echo $row['mother_name']; ?></span>
            </div>
        </div>
        <div class="footer">
            This letter is issued in accordance with the employment laws of India. It is a true and accurate record of the job offer extended to the individual named above.
        </div>
    </div>
</body>

</html>