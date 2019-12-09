<?php include('menu.php');?>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">


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
            <div class="col-lg-12">
                        
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Order Id</th>
                <th>Username</th>
                <th>Amount</th>
                <th>Tranjection Id</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
           
        $datas = view('payment_history',"",'','');
        foreach($datas as $data){
      
            ?>
            <tr>
                <td><a href="singleorderdetails.php?orderid=<?php echo $data['order_id'];?>&username=<?php echo $data['username'];?>"><?php echo $data['order_id'];?></a></td>
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['amount'];?></td>
                <td><?php echo $data['tra_id'];?></td>
                 <td><?php echo $data['status'];?></td>
                <td><?php echo $data['created'];?></td>
            </tr>
        <?php
        
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                 <th>Order Id</th>
                <th>Username</th>
                <th>Amount</th>
                <th>Tranjection Id</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </tfoot>
    </table>
    
    
    
    
    
    
    
    
    

    
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    


            </div>


                </div>
              </div>
            </div>
          </div>

        </div>
<?php include('footer.php');?>
       
