<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Warning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8d7da;
            color: #721c24;
            font-family: Arial, sans-serif;
        }

        .warning {
            text-align: center;
            padding: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            background-color: #f8d7da;
        }

        .warning h1 {
            margin: 0;
            font-size: 24px;
        }

        .warning p {
            margin: 10px 0 0;
        }
    </style>
</head>

<body>
    <div class="warning">
        <h1>Device Not Supported</h1>
        <p>Please use a laptop or desktop to access this site.</p><br>
        <a href="{{ route('landing_page') }}" class="btn btn-danger">Kembali</a>
    </div>
</body>

</html>
