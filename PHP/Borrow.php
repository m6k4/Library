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
    $mail = $_SESSION['user'][1];

    if($db->borrowBook($_POST['book_id'], $mail)):?>
        <p> Borrowing complete </p>
        <?php if($_SESSION['user'][0] == 1):?>
             <p><a href = "../html/Books_table.php" id = 'login_link'>Go back</a></p>
        <?php elseif($_SESSION['user'][0] == 2): ?>
            <p><a href = "../html/Login_succesful.php" id = 'login_link'>Go back</a></p>
        <?php endif ?>

    <?php else: ?>
        <p>Borrowing failed</p>
        <?php if($_SESSION['user'][0] == 1):?>
            <p><a href = "../html/Books_table.php" id = 'login_link'>Go back</a></p>
        <?php elseif($_SESSION['user'][0] == 2): ?>
            <p><a href = "../html/Login_succesful.php" id = 'login_link'>Go back</a></p>
        <?php endif ?>

    <?php endif ?>

</body>

</html>