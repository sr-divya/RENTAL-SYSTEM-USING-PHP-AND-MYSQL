<?php

include('inc/header.php');
include('connection.php');
error_reporting(0);

?>

<body class="">
    
</body>
<div class=" mb-3   bg-primary-subtle" style="width:600px; height:800px; margin-left:400px; margin-top:20px;">
    <div class=" bg-success py-3 text-white text-center">
        <h1>Customer Details</h1>
    </div>
    <div class="my-5 mx-5">
        <form action="" method="POST" >
            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Name</label>
                <input type="text" class="form-control border border-primary" name="name">

            </div>

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Email-id</label>
                <input type="email"  class="form-control border border-primary" name="email">

            </div>

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Aadhar No</label>
                <input type="text" data-type="adhaar-number" class="form-control border border-primary" name="aadhar">

            </div>

            

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Contact No</label>
                <input type="digit" class="form-control border border-primary" name="phone">

            </div>

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Date</label>
                <input type="date" class="form-control border border-primary" name="date">

            </div>

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Return_Date</label>
                <input type="date" class="form-control border border-primary" name="rdate">

            </div>

            <div class="mb-1 px-3 mx-5">
                <label class="form-label">Address </label>
                <input type="text" class="form-control border border-primary" name="address">

            </div>

            <div class="mb-3 px-3 mx-5">
                <label class="form-label">Model No </label>
                <input type="text" class="form-control border border-primary" name="model">

            </div>

            <div class="mb-3 px-3 mx-5">
                <button type="submit" class="btn btn-outline-primary" name="submitbtn">Submit</button>

            </div>
        </form>

    </div>

</div>


<?php

$Name=$_POST['name'];
$Email=$_POST['email'];
$Aadhar=$_POST['aadhar'];
$Contact=$_POST['phone'];
$Date=$_POST['date'];
$Returndate=$_POST['rdate'];
$Address=$_POST['address'];
$Model=$_POST['model'];

if(isset($_POST['submitbtn']))
{
    if($Name==''|| $Email=='' || $Aadhar=='' || $Contact=='' ||$Date=='' ||$Returndate=='' ||$Contact=='' || $Address=='' || $Model=='')
    {
        echo ("<h3>* All fields are compulsory!</h3>");
    }
    else{
        $model=mysqli_real_escape_string($conn,$_POST['model']);

        $q="select * from `customer` where Model='$model' ";
        $run=mysqli_query($conn,$q);
        if(mysqli_num_rows($run)>0)
        {
            echo "<h3>*The model $Model is already on rent!</h3>";
        }
    
        else{
            $query1="insert into customer(Name,Email, Aadhar, Contact, Date,Return_date,Address ,Model) values ('$Name','$Email','$Aadhar','$Contact','$Date','$Returndate','$Address','$Model')";

            $query2="insert into customer_data(Name,Email, Aadhar, Contact, Date,Return_date,Address ,Model) values ('$Name','$Email','$Aadhar','$Contact','$Date','$Returndate','$Address','$Model')";

            $run_query1=mysqli_query($conn,$query1);
            $run_query2=mysqli_query($conn,$query2);
            if($run_query1 && $run_query2)
            {
            echo "<h3>* Congratulations! You have baught $Model on rent.</h3>";
            }else{
                echo "<h3>*Error reported!</h3>";
            }
        }
    }
}


?>

<?php

include('inc/footer.php');

?>
