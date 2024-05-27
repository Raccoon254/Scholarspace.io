<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1 {
            color: #6c757d;
        }
        p {
            color: #6c757d;
            font-size: 1.1em;
            line-height: 1.6;
        }
        strong {
            color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Form Submission</h1>

        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong> {{ $user_message }}</p>
    </div>
</body>
</html>
