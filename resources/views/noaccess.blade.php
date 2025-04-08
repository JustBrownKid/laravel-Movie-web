<!-- resources/views/noaccess.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>No Access</title>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #f8f9fa;
        }
        h1 {
            font-size: 3rem;
            color: #dc3545;
        }
        p {
            color: #6c757d;
        }
        a {
            margin-top: 1rem;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h1>🚫 No Access</h1>
    <p>You do not have permission to view this page.</p>
    <a href="{{ url('/dashboard') }}">Go back home</a>
</body>
</html>
