<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Template</title>
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
    </style>
</head>

<body>
    <div class="certificate">
        <div class="header">
            Certificate of Achievement
        </div>
        <div class="body">
            This is to certify that <span id="full_name">[Full Name]</span>, a student of <span id="schname">[School Name]</span>, has demonstrated outstanding performance and dedication in academic pursuits.

            <br><br> Born at <span id="place_of_birth">[Place of Birth]</span>, the student is the child of <span id="father_name">[Father's Name]</span> and <span id="mother_name">[Mother's Name]</span>.

            <br><br> This certificate is awarded with registration number <span id="registration_number">[Registration Number]</span>.

        </div>
        <div class="footer">
            Congratulations on your achievements!
        </div>
    </div>
</body>


</html>