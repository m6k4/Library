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

<?php if($user = $db->getUser($_POST["email"], $_POST["password"])):?>
            <p> Welcome <?php echo $user[2] ?> </p>
            <?php
                $_SESSION['user'] = $user;
            ?>
            <p> <a href = "../html/menu.php" id = registration_link>Go to your panel</a></p>

      <?php else: ?>
            <p>Email or password is incorrect</p>
      <?php endif ?>

</body>

</html>
