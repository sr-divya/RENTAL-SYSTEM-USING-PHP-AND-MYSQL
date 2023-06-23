<?php

include('inc/header.php');
include('connection.php');

?>

<div class="container mt-4">
    <h1 class="text-center text-danger">Latest Models</h1>
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

            <h5 class="text-center bg-primary-subtle "><?php echo $row['Model'] ?></h5>
            
            </div>
            <div>
                <form action="" method="post">
                <button type="submit" class="btn btn-outline-danger" name="buybtn">Buy on rent</button>
                </form>
                <?php

                    if(isset($_POST['buybtn']))
                    {
                        header('location:customer.php');
                    }

                ?>
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

<?php

include('inc/footer.php');
?>


