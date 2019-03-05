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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8">
</head>

<body>

<?php if(!isset($_SESSION['user'])): ?>
    <p> <a href = "../html/login.php" id = registration_link>Go to login</a></p>
<?php else: ?>
    <?php session_unset(); ?>
    <p> <a href = "../html/login.php" id = registration_link>Go to login</a></p>
<?php endif ?>

</body>

</html>