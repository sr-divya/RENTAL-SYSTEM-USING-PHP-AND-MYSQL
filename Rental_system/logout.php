<?php

include('connection.php');

?>

<form action="" method="post">
            <button type="submit" name="logoutbtn" class="btn btn-outline-danger" style="margin-left:1420px; ;" >Log Out</button>
</form>

<?php

if(isset($_POST['logoutbtn']))
{
    unset($_SESSION['email']);
    session_destroy();
    header('location:login.php');
}

?>


