<?php include('menu.php');?>

       <?php
      if (isset($_GET['pid'])) {
	$id = $_GET['pid'];
    $deleted = delete('orders',"id=$id");
	if($deleted){
		echo "<script>window.location='product_order.php';</script>";
	}
  } 
?>
<div class="right_col" role="main">
      

        

          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <form action=""method="post">
                  <h2>Shop Timing</small></h2>
                 
                 
                </div>

                <div class="x_content">
                  <?php
if(isset($_POST['opcl']))
{
  $o=$_POST['open_close'];
   $sql="update on_off set open_Close='$o' where id=1";
  if (mysqli_query($mysqli ,$sql)) 
  {
      //header("location:menu.php");
      echo '<div class="alert alert-success">
  <strong>Success!</strong> Time Updated Successfully.
</div>';
  }

}
?>
               
<div class="row">
            <div class="col-lg-3">
                        
                    
        
              <?php
$sql="select * from on_off";
$x=mysqli_query($mysqli,$sql);
while($r= mysqli_fetch_assoc($x))
{
  $ocdata = $r['open_Close'];
}
?>
            
<form action="" method="post">
          
                <select class="form-control" name="open_close">
                <option <?php if($ocdata=='On') echo "selected" ?> value="On">Open</option>
                <option <?php if($ocdata=='Off') echo "selected" ?> value="Off">Close</option>
                </select>
                </br>
                </br>
               <input type="submit" class="btn btn-info" value="Submit" name="opcl">


</form>
  







                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

       
<?php include('footer.php');?>
       
