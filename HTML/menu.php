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
<div class="userName">
    <p>Login as <?php echo $_SESSION['user'][1]?></p>
    <form class = 'login' action ='../php/logout.php' method="post">
        <button type="submit" class="button" >Logout</button>
    </form>
</div>
    <?php if($_SESSION['user'][0] == 2 ): ?>
        <p> <a href = "../html/Login_succesful.php" id = login_succesful_link>Let's search book</a></p>
    <?php elseif ($_SESSION['user'][0] == 1 ): ?>
        <p> <a href = "../html/Users_table.php" id = users_table_link>Check users list</a></p>
        <p> <a href = "../html/Books_table.php" id = books_table_link>Check books list</a></p>
        <p> <a href = "../html/New_employee_registration.php" id = new_employee_link>Add new employee</a></p>
    <?php endif; ?>

    <div class = "menu_options">
        <p> <a href = "../html/Borrowed_books.php" id =change_pass>Show my borrowed books</a></p>
        <p> <a href = "../html/Change_pass.php" id =change_pass>Change your password</a></p>
    </div>

    <div class="footer">
        Copyright © 2019 Zuzanna
    </div>

</body>

</html>