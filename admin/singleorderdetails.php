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
        <div class="">

          <div class="clearfix"></div>


          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>All Orders</small></h2>
                 
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

               
<div class="row">
    <u><h2 style="text-align:center">Orders Details</h2></u>
            <div class="col-lg-12">
             
                        
                        
                        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product Name </th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_id = $_GET['orderid'];
        $datas = view('orders',"order_id='$order_id'",'','');
        foreach($datas as $data){
     
            ?>
            <tr>
                <td><?php echo $data['product_name'];?></td>
                <td><?php echo $data['price'];?></td>
                <td><?php echo $data['quantity'];?></td>
                 <td>
                     <?php
                     if($data['status']==0){
                         $stc='red';
                     }
                     if($data['status']==1){
                         $stc='black';
                     }
                     if($data['status']==2){
                         $stc='yello';
                     }
                     if($data['status']==3){
                         $stc='green';
                     }
                
                ?>
                 <select style="color:<?php echo $stc; ?>" id="pstatus" class="" name="pstatus">
                     <option  <?php if($data['status']==0) echo "selected"?> value="0">Rechad</option>
                     <option  <?php if($data['status']==1) echo "selected"?> value="1">Packed</option>
                     <option  <?php if($data['status']==2) echo "selected"?> value="2">Out for delevered</option>
                     <option  <?php if($data['status']==3) echo "selected"?> value="3">Delevered</option>
                 </select>
                 
                 
                 
                 </td>
            </tr>
        <?php
        
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Product Name </th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Order Status</th>
            </tr>
        </tfoot>
    </table>
     </div>
     
<div class="row">
     <div class="col-lg-12">
      <u> <h2 style="text-align:center">User Details</h2></u>
      
             <div class="col-lg-6">
           <table id="example" class="table table-striped table-bordered" style="width:100%">
    
        <tbody>
            <?php
            $username = $_GET['username'];
        $userdatas = view('users',"username='$username'",'','');
        foreach($userdatas as $userdata){
              //print_r($userdata);
            ?>
            <tr><th>Username </th>   <td><?php echo $userdata['username'];?></td> </tr>
             <tr><th>Email </th>   <td><?php echo $userdata['email'];?></td> </tr>
              <tr><th>Name </th>   <td><?php echo $userdata['name'];?></td> </tr>
               <tr><th>Phone </th>   <td><?php echo $userdata['name'];?></td> </tr>
                <tr><th>Address1 </th>   <td><?php echo $userdata['address1'];?></td> </tr>
                 <tr><th>Address2 </th>   <td><?php echo $userdata['address2'];?></td> </tr>
               
           
        <?php
        
        }
        ?>
        </tbody>
 </table>
     </div>
     
      <div class="col-lg-6">
           <table id="example" class="table table-striped table-bordered" style="width:100%">
    
        <tbody>
            <?php
            $username = $_GET['username'];
        $userdatas = view('users',"username='$username'",'','');
        foreach($userdatas as $userdata){
             // print_r($userdata);
            ?>
                  <tr><th>Country </th>   <td><?php echo $userdata['country'];?></td> </tr>
                   <tr><th>State </th>   <td><?php echo $userdata['state'];?></td> </tr>
                    <tr><th>City </th>   <td><?php echo $userdata['city'];?></td> </tr>
                     <tr><th>Zip </th>   <td><?php echo $userdata['zip'];?></td> </tr>
                     <tr><th>Ordered Date </th>   <td><?php echo $userdata['created'];?></td> </tr>
                      <tr><th>User Status</th>   <td>Active</td> </tr>
               
           
        <?php
        
        }
        ?>
        </tbody>
 </table>
     </div>
      </div> </div>
     

                </div>
              </div>
            </div>
          </div>

        </div>
<?php include('footer.php');?>
       
