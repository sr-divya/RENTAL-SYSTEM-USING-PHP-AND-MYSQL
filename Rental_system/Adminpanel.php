<?php

include('connection.php');
include('inc/header.php');
error_reporting(0);

session_start();
if(!isset($_SESSION['email']))
{
    header('location:login.php');
}

?>

<div class=" container d-flex justify-content-center text-align-center  bg-dark">
    <div class="mx-5 my-5 ">

        <form action="#" class="form-control"  method="POST" enctype="multipart/form-data">
            <label for="" class="form-label">Enter Model</label>
            <input type="text" name="model" class="form-control"><br>
            <input type="file" name="img"><br><br>
            <button type="submit" name="uploadbtn" class="btn btn-outline-success" >Upload</button><br>
            <button type="submit" name="logoutbtn" class="btn btn-outline-danger" style="margin-left:0px; margin-top:10px;" >Log Out</button>
        </form>
        <!-- <form action="#" method="post"> -->
        <!-- </form> -->
        
    <!-- </div> -->
    </div>
    

</div>/

<?php

if(isset($_POST['logoutbtn']))
{
    unset($_SESSION['email']);
    session_destroy();
    header('location:login.php');
}

?>

<?php

include('footer.php');

?>


<?php

$Model=$_POST['model'];
$filename=$_FILES["img"]["name"];
$tempname=$_FILES["img"]["tmp_name"];
$folder="image/".$filename;

move_uploaded_file($tempname,$folder);

if(isset($_POST['uploadbtn']))
{
    if($filename=='' && $Model=='')
    {
        echo "<h3>* Please select a file first!</h3>";
    }
    else{
    
        $query="insert into `upload`(Image_src,Model) values ('$folder','$Model')";

        $run_query=mysqli_query($conn,$query);

        if($run_query)
        {
            // echo "<h3>* Data Inserted Successfully!</h3>";
        }else{
            echo "<h3>*Data is not inserted</h3>";
        }
    }
}

?>

<div class="container mt-4">
    <h1 class="text-center text-danger">Latest Images</h1>
    <hr style="height: 10px; opacity: 1; background-color: yellow;">
    <div class="row d-flex justify-content-center">
<?php 

$q="select * from `upload` order by id desc";
$run_query=mysqli_query($conn,$q);
if((mysqli_num_rows($run_query))>0)
{
    while($row=mysqli_fetch_assoc($run_query))
    {

        ?>
        <div class="col-sm-3 m-3">
            <div class="card " style="width: 18rem;">
            <img src="<?php echo $row['Image_src'] ?>" class="card-img-top w-100" style="width: 200px; height: 300px;" alt="..." >
            
            
            </div>
        </div>

           <?php        
    }
}
else{
    echo "<h3>*No Data Found</h3>";
}

?>

            
            </div>
        </div>


