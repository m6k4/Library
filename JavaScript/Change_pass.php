<pre>
    <?php
    session_start();
    ?>
</pre>
<?php
require("../DataBase.php");
$db = new DataBase();

?>

<script>
    function changePasss() {
        var oldPass = document.getElementsByName("current_password");
        var newPass = document.getElementsByName("new_password");
        var replyNewPass = document.getElementsByName("reply_new_password");

        // if(oldPass == newPass){
            alert("Confirm password is not same as you new password.");
        // }

    }
</script>