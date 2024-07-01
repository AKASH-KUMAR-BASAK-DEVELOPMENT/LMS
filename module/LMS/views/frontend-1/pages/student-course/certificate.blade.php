<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .certificate-container {
            padding: 33px;
            background-color: white;
            width: 810px;
            text-align: center;
            background-image: url('{{ asset('frontend-1/assets/images/certificate-bg.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .certificate {
            padding: 20px;
            /*border: 5px solid #3c763d;*/
        }

        .header {
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            display: block;
            margin: 0 auto;
        }

        h1 {
            color: #3c763d;
            font-size: 24px;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            font-size: 22px;
            margin: 20px 0;
        }

        h3 {
            color: #3c763d;
            font-size: 20px;
            margin: 20px 0;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .signature {
            text-align: left;
        }

        .signature img {
            width: 150px;
        }

        .signature p {
            margin: 0;
            font-size: 14px;
        }

        .verify {
            margin-top: 20px;
            font-size: 14px;
        }

        .verify a {
            color: #3c763d;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="certificate-container">
    <div class="certificate">
        <div class="header">
            <img src="https://www.w3schools.com/images/w3schools_logo_436_2.png" alt="W3Schools Logo" class="logo">
            <h1>CERTIFICATE OF COMPLETION</h1>
        </div>
        <p>This certifies that</p>
        <h2>{{ $student->name }}</h2>
        <p>has completed the necessary courses of study and passed<br>
            the W3Schools' {{ $studentCourseCertificate->title }} exams and is hereby declared a</p>
        <h3>Certified {{ $studentCourseCertificate->title }}</h3>
        <p>with fundamental knowledge of {{ $studentCourseCertificate->title }}.</p>
        <div class="footer">
            <p>Issued May 18, 2022</p>
            <div class="signature">
                <img src="{{ asset('frontend-1\assets\images\certificate-signature.png') }}" alt="Signature">
                <p>Thomas Thorsell-Arntsen<br>for Educube Australia</p>
            </div>
        </div>
        <p class="verify">Verify completion at <br>
            <a href="https://verify.w3schools.com/1ML8E7IMEL">https://verify.w3schools.com/1ML8E7IMEL</a></p>
    </div>
</div>
</body>
</html>
