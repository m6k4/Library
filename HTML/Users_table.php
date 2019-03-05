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
    <title>Users List</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8">

</head>

<body>
<body>
<div class="userName">
    <p>Login as <?php echo $_SESSION['user'][1]?></p>
    <form class = 'login' action ='../php/logout.php' method="post">
        <button type="submit" class="button" >Logout</button>
    </form>
</div>
<p><a href = "../html/menu.php" id = 'login_link'>Go back</a></p>

<h1> Users List</h1>
<table>
    <tr>

        <th>Email</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Birth Date</th>
        <th>Type</th>

    </tr>
    <?php $loged_user = 'michal@op.pl'; ?>
    <?php $users = $db->getUsers(''); foreach ($users as $user): ?>
        <tr>
            <?php foreach ($user as $values): ?>
                <td> <?php echo $values;?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>

</table>

<div class="footer">
    Copyright © 2019 Zuzanna
</div>

</body>

</html>