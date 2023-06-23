<?php

include('inc/header.php');
include('connection.php');
session_start();
// $_SESSION['email']

?>
<style>
    h3{
        color:white;
    }
</style>

<body style="background-image:url('img/bike4.jpg'); background-size:cover;">
    

<div class="mb-3   bg-primary-subtle text-dark" style="width:500px; margin:500px; margin-top:100px;">

<div class="mb-0 bg-success text-white text-center py-3">
    <h1>Login Form</h1>
</div>

<form action="" method="POST">
    <div class="mb-3 px-5 pt-5">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control border border-primary" placeholder="name@example.com" name="email">
    </div>
    
    <div class="mb-3 px-5 pb-3 ">
        <label class="form-label">Password</label>
        <input type="password" class="form-control border border-primary" name="pass">
    </div>

    <div class="mb-3 pb-5 px-5 ">
        <button type="submit" name="loginbtn" class="btn btn-danger ">
            Log In &rarr; 
        </button>
    </div>
</form>
    
</div>

<?php

if(isset($_POST['loginbtn']))
{
    $Email=mysqli_real_escape_string($conn,$_POST['email']);
    $Password=mysqli_real_escape_string($conn,$_POST['pass']);

    $query="select * from admin where Email='$Email' and Password='$Password'";

    $run_query=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($run_query);

    $_SESSION['email']=$Email;
    if($result)
    {
        if(isset($_SESSION['email']))
        {
            header('location:Adminpanel.php');
        }else{
            header('location:login.php');
            echo "<h3>*Invalid Credentials!</h3>";
        }
    }
    else{
        echo "<h3>* Invalid Credentials!</h3>";
    }
}

?>




<?php

include('inc/footer.php');

?>