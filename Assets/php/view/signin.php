
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login form</title>

    </head>
    <body>
        <h1>Login</h1>
        <form action="../model/login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <span>Forgot?</span>
            <input type="submit" name="login-btn" value="Login">
        </form>
            <p>Not registered yet? <a href="../../php/view/signup.php">Sign up</a></p>
    </body>
</html>