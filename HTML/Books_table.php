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
    <p>Login as <?php echo $_SESSION['user'][1]?></p>
    <form class = 'login' action ='../php/logout.php' method="post">
     <button type="submit" class="button" >Logout</button>
    </form>
</div>
<p><a href = "../html/menu.php" id = 'login_link'>Go back</a></p>
<h1> Books List</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Borrower</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Type</th>
        <th>Borrow</th>

    </tr>
    <?php $books = $db->getBooks();$length = count($books); $i = 1; foreach ($books as $book): ?>
        <tr>
            <?php foreach ($book as $values): ?>
            <td> <?php echo $values ;?> </td>
            <?php endforeach; ?>
            <?php if(!$book[1]): ?>
                <td>
                    <form class = 'registration' action ='../php/borrow.php' method="post">
                        <input type="hidden" name = "book_id" value = <?php echo $book[0]; ?>>
                        <button type="submit" class="button">Borrow</button>
                    </form>
                </td>
            <?php else: ?>
                <td> Borrowed </td>
            <?php endif; ?>

        </tr>

    <?php endforeach; ?>

</table>

<div class="footer">
    Copyright © 2019 Zuzanna
</div>

</body>


</html>