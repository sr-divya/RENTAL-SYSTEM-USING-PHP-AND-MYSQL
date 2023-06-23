<?php

include('inc/header.php');
include('connection.php');

?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i>Bike Rental System</i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        
        
          
        
      </ul>
      <form class="d-flex" role="search" method="POST">
        <button class="btn btn-outline-light px-3 mx-3" type="submit" name="loginbtn">Login</button>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" >
        <button class="btn btn-outline-light" type="submit" name="searchbtn">Search</button>
      </form>
    </div>
  </div>
</nav> 

<body style="background-image:url('img/bike4.jpg'); background-size:cover;">

<form action="" method="post">
<div style="margin-left:1380px; margin-top:20px;">
<button class="btn btn-outline-primary mb-3" type="submit" name="viewbtn">View all img &rarr;</button>
<button class="btn btn-outline-danger" type="submit" name="deletebtn">Delete record &rarr;</button>

</div>
</form>

<!-- <form action="" method="post">
<div style="margin-left:1400 margin-top:0px;">
<button class="btn btn-outline-danger" type="submit" name="deletebtn">Delete record &rarr;</button>
</div>
</form> -->
    
</body>

<?php

include('inc/footer.php');

?>

<?php

if(isset($_POST['loginbtn']))
{
  header('location:login.php');
}

?>

<?php

if(isset($_POST['viewbtn']))
{
  header('location:homepage.php');
}

?>

<?php

if(isset($_POST['deletebtn']))
{
  header('location:dltrecord.php');
}

?>

<?php

// $Search=$_POST['search'];
if(isset($_POST['searchbtn']))
{
    $Search=mysqli_real_escape_string($conn,$_POST['search']);

    $query="select Model from `upload` where Model= '$Search'";

    $run_query=mysqli_query($conn,$query);
    if(mysqli_num_rows($run_query)>0)
    {
      echo ("<h4>* $Search is available!</h4>");
    }else{
      echo ("<h4>* $Search is Out of stock!</h4>");
    }

}

?>

<!-- <div class="container">
  <div class="row">
    <div class="mb-3"></div>
  </div>
</div> -->