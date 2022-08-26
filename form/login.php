<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require './database.php';

    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {

        if (password_verify($_POST["password"], $user["passwordHash"])) {
            echo ("<script LANGUAGE='JavaScript'>
    window.alert('Log-in successful. Redirecting to the home page...');
    window.location.href='../index.html';
    </script>");
            exit;
        }
    }

    $is_invalid = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="../form/style.css">
    <title>Log in</title>
</head>

<body>
    <div class="mainbody">
        <h1>Log in</h1>

    <?php if ($is_invalid): ?>
        <em style="color:red">Invalid E-mail/Password</em>
    <?php endif; ?>

        <form method="post">
            <div>
                <label for="email">email</label>
                <input type="email" id="email" name="email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button>Log in</button>
    </form>
        <span>return to <a href="../index.html">home.</a></span>
    </div>
</body>
</html>
