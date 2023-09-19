<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pico-master/css/pico.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <article data-aos="flip-left">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="uname" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="./pages/sign-up.php">Create an account</a>
    </article>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>