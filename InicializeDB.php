
<?php

require("DataBase.php");

$db = new DataBase(); //user, password

$db->fillDataBase();


$books = $db->getBookById(4);
$db->isBorrowed(3);
print_r($db->getBooksbyUser('lessi@op.pl'));
//$db->changePassword('a@op.pl', 'a');
//$user = $db->getUser('a@op.pl', 'a');
//$db->addUser(1, 'z@op.pl', 's', 's', '2-12-1995','cs');?>