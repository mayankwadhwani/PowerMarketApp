<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello!</p>

    <p>The user {{ $user_name ?? 'from powermarket.ai' }} has invited you to his organization {{ $organization ?? '' }}.</p>

    <p>Follow this <a href="{{ $link }}">link</a> to finish sign up process.</p>


    <p>PowerMarket | Solar Analytics</p>
</body>
</html>