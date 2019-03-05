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

    <?php $user_id =  $_SESSION['user'][1]; ?>


        <?php if($db->changePassword($user_id, $_POST["new_password"])):?>
            <p> Password has been changed succesfully !</p>
        <?php else: ?>
            <P> Password change failed </P>
        <?php endif ?>
        <form class = 'login' action ='../php/logout.php' method="post">
            <button type="submit" class="button" >Go back</button>
        </form>



</body>
</html>

