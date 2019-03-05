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
    <script src="../JavaScript/Change_pass.php"></script>
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

<form class = 'login' action ='../php/Change_pass.php' method="post">

    <h1>Change your password</h1>
    <div class = "login_forms">
        <div class="input">
            <input type="password" id="current_password" placeholder="Current password" name="current_password" required>
        </div>

        <div class="input">
            <input type="password" id="new_password" placeholder="New password" name="new_password" required>
        </div>

        <div class="input">
            <input type="password" id="reply_new_password" placeholder="Reply new password" name="reply_new_password" required>
        </div>

        <button type="submit" class="button" onclick="return changePass()">Change</button>

    </div>

</form>

</body>

</html>


<script>

    function changePass() {


        //php session array
        var nums = <?php echo json_encode($_SESSION['user']); ?>;
        var currentPass = nums[5];

        var oldPass = document.getElementById("current_password").value;
        var newPass = document.getElementById("new_password").value;
        var replyNewPass = document.getElementById("reply_new_password").value;

        if(oldPass != currentPass ){
            alert("Current password is incorrect");
            return false;
        }
        else if(newPass == currentPass){
            alert("New password is the same ass your current");
            return false;
        }
        else if(newPass != replyNewPass){
            alert("Replayed password does not match new password");
            return false;
        } else{
            return true;
        }

    }
</script>