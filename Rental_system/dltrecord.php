<?php

include('connection.php');
include('inc/header.php');

?>
<body class="bg-danger-subtle">
    
</body>

<div class="mb-3   bg-primary-subtle text-dark" style="width:500px; margin:500px; margin-top:100px;">

<div class="mb-0 bg-success text-white text-center py-3">
    <h1>Delete Record</h1>
</div>

<form action="" method="POST">
    <div class="mb-1 px-5 pt-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control border border-primary" name="name">
    </div>

    <div class="mb-1 px-5 pt-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control border border-primary" placeholder="name@example.com" name="email">
    </div>
    
    <div class="mb-1 px-5 pt-3 ">
        <label class="form-label">Aadhar</label>
        <input type="text" data-type="adhaar-number" class="form-control border border-primary" name="aadhar">
    </div>

    <div class="mb-3 px-5 pt-3 ">
        <label class="form-label">Model</label>
        <input type="text"  class="form-control border border-primary" name="model">
    </div>

    <div class="mb-3 pt-5 px-5 ">
        <button type="submit" name="deletebtn" class="btn btn-danger mb-3">
            Delete &rarr; 
        </button>
    </div>
</form>
    
</div>

<?php

if(isset($_POST['deletebtn']))
{
    // $Name=mysqli_real_escape_string($conn,$_POST['name']);
    // $Email=mysqli_real_escape_string($conn,$_POST['email']);
    $Aadhar=mysqli_real_escape_string($conn,$_POST['aadhar']);
    // $Model=mysqli_real_escape_string($conn,$_POST['model']);

    $query="delete from `customer` where  Aadhar='$Aadhar'";

    $run_query=mysqli_query($conn,$query);
    if($run_query)
    {
        echo "<h4>*Bike Returned Successfully!</h4>";
    }
    else{
        echo "<h4>*Error reported!</h4>";
    }
}

?>

