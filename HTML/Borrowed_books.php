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
    <title>Books List</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="utf-8">
</head>

<body>

<div class="userName">
    <?php $user = $_SESSION['user'] ?>
    <p>Login as <?php echo $user[1]?></p>
    <form class = 'login' action ='../php/logout.php' method="post">
        <button type="submit" class="button" >Logout</button>
    </form>
</div>
<p><a href = "../html/menu.php" id = 'login_link'>Go back</a></p>
<h1> Your borrowed books</h1>

<table>
    <tr>

        <th>Id</th>
        <th>Borrower</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Type</th>

    </tr>


    <?php $books = $db->getBooksbyUser($user[1])?>

        <?php foreach ($books as $book): ?>
    <tr>
            <?php foreach ($book as $value): ?>
            <td>
                <?php echo $value?>
            </td>
            <?php endforeach;?>
    </tr>
        <?php endforeach; ?>




</table>


</body>

</html>
