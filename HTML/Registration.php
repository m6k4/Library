<pre>
    <?php
    session_start();
    ?>
</pre>
<html>
<head>

    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8">
</head>

<body>
<?php if(!isset($_SESSION['user'])): ?>
<form class = 'registration' action ='../php/register.php' method="post">
    <h1>Create your account </h1>
    <div class = "registration_forms">

        <div class="name">
            <input type="text" placeholder="Name" name="name" required>
        </div>

        <div class="surname">
            <input type="text" placeholder="Surname" name="surname" required>
        </div>

        <div class="date">
            <input type="date" placeholder="Date" name="date" required>
        </div>

        <div class="email">
            <input type="email" placeholder="Email" name="email" required>
        </div>

        <div class="password">
            <input type="password" placeholder="Password" name="password" required>
        </div>

       <button type="submit" class="button">Register</button></form
    </div>

    <p><a href = "Login.php" id = 'login_link'>Login</a></p>

</form>
<?php else: ?>
    <p>You are already login</p>
    <p> <a href = "../html/menu.php" id = registration_link>Go to your panel</a></p>
<?php endif ?>

</body>

<div class="footer">
    Copyright © 2019 Zuzanna
</div>
</html>