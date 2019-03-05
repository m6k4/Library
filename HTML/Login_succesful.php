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

<div class="userName">
    <p>Login as <?php echo $_SESSION['user'][1]?></p>
    <form class = 'login' action ='../php/logout.php' method="post">
        <button type="submit" class="button" >Logout</button>
    </form>
</div>
        <p><a href = "../html/menu.php" id = 'login_link'>Go back</a></p>
    </div>
    <h1> Searching book</h1>
    <div class="panel">

        <div class="search">
            <form class = 'login2' action ='searching.php' method="post">
                <h1>Searching by title</h1>
                <div class = "login_forms">
                    <div class="input">
                        <input type="text" placeholder="Title" name="title">
                    </div>
                    <button type="submit" class="button" name="button_1">Find</button>
                </div>

            </form>
        </div>
        <div class="search2">
            <form class = 'login2' action ='searching.php' method="post">
                <h1>Searching by type</h1>
                <div class = "login_forms">
                    <div class="input">
                        <select name="types">
                            <?php $types =  $db->getBookTypes(); foreach($types as $type): ?>
                                <option><?php echo $type; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <button type="submit" class="button" name="button_2">Find</button>

                </div>

            </form>
        </div>
    </div>
        <div class="footer">
            Copyright © 2019 Zuzanna
        </div>
</body>

</html>