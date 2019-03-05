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

<form class = 'registration' action ='../php/register.php' method="post">
    <h1>Add new employee </h1>
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

        <button type="submit" class="button">Register</button>
</form>

<div class = "goBack">
    <p><a href = "../html/menu.php" id = 'menu_link'>Go back to menu</a></p>
</div>

</body>

</html>
