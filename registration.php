<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>register</h2>
        </div>
    </div>
    <form action="registration.php" method="post">
        <?php include('errors.php'); ?>


        <div>
            <label for="username">Username</label>
            <input type="text" name='username' required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password_1" required>
        </div>

        <div>
            <label for="password">Confirm Password</label>
            <input type="password" name="password_2" required>
        </div>

        <button type="submit" name="reg_user">Submit</button>

        <P>already a User?<a href="login.php"><b>Log in</b></P>




    </form>


    
</body>
</html>