<pre>
    <?php
    session_start();
    ?>
</pre>

<html>
<head>

    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<meta charset="utf-8">
</head>

    <body>
    <?php if(!isset($_SESSION['user'])): ?>
        <form class = 'login' action ='../php/login.php' method="post">
            <h1>Welcome to online library </h1>
            <div class = "login_forms">
                <div class="email">
                    <input type="email" placeholder="Email" name="email">
                </div>

                <div class="password">
                    <input type="password" placeholder="Password" name="password">
                </div>

               <button type="submit" class="button">Login</button>

            </div>

           <p> <a href = "Registration.php" id = registration_link>Registration</a></p>
        </form>
    <?php else: ?>
        <p>You are already login</p>
        <p> <a href = "../html/menu.php" id = registration_link>Go to your panel</a></p>
    <?php endif ?>

        <div class="footer">
            Copyright © 2019 Zuzanna
        </div>
    </body>

</html>