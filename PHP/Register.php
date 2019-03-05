<pre>
    <?php
    session_start();
    ?>
</pre>
<?php
require("../DataBase.php");
$db = new DataBase();

?>

<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8">
</head>

<body>

<?php
        if(isset($_SESSION['user']) && $_SESSION['user'][0] == 1 ): ?>
            <?php if($db->addUser(1, $_POST["email"], $_POST["name"], $_POST["surname"], '2-12-1995', $_POST["password"])):?>
                <p> New employee added succesful! </p>
                <p><a href = "../html/menu.php" id = 'menu_link'>Go back to menu</a></p>
            <?php else: ?>
                <p> Registration failed </p>
                <p><a href = "../html/New_employee_registration.php" id = 'menu_link'>Go back </a></p>
            <?php endif; ?>

        <?php else: ?>
            <?php if($db->addUser(2, $_POST["email"], $_POST["name"], $_POST["surname"],
                '2-12-1995', $_POST["password"])):?>
                <p> Registration complete </p>
                <p><a href = "../html/Login.php" id = 'login_link'>Go back to login</a></p>
            <?php else: ?>
                <p>Registration failed</p>
                <p><a href = "../html/registration.php" id = 'menu_link'>Go back</a></p>
            <?php endif ?>

        <?php endif; ?>

</body>

</html>
