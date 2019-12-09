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
if(isset($_POST['add_time']))
{
  $o=$_POST['open'];
  $c=$_POST['close'];
   $sql="update time set open='$o',close='$c' where id=1";
  if (mysqli_query($mysqli ,$sql)) 
  {
      //header("location:menu.php");
      echo '<div class="alert alert-success">
  <strong>Success!</strong> Time Updated Successfully.
</div>';
  }
  else{
    //header("location:menu.php");
  
  }
}
?>
               
<div class="row">
            <div class="col-lg-6">
                        
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Opining Time</th>
               <th>Closing Time</th>
               
            </tr>
</thead>
            <tr>
              <?php
$sql="select * from time";
$x=mysqli_query($mysqli,$sql);
while($r= mysqli_fetch_assoc($x))
{
  ?>

                <th><input type="time" name="open" value="<?php echo $r['open'] ?>"></th>
               <th><input type="time" name="close"value="<?php echo $r['close'] ?>"></th>
                <?php
}
?>
            </tr>

            <tr>
               <th><input type="submit" class="btn btn-info" value="Submit"name="add_time"></th>

</tr>

  

</table>
  






                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

       
<?php include('footer.php');?>
       
