<?php include('menu.php');?>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

 <!-- top navigation -->
 <?php 
 
 

/* echo "<pre>";
print_r($events);
echo "</pre>"; */
//exit();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
    $deleted = delete('products',"id=$id");
	if($deleted){
		echo "<script>window.location='all_product.php';</script>";
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
                  <h2>Product List</h2>
                
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

               
             <div class="row">
            <div class="col-lg-12">
                      <form method="post" action="del_mail.php" >
                    
                        
                            
                              <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
             <tr class="table-success">
                                          <th>S.NO</th>
                                        <th>Product</th>
										 <th>Status</th>
                                        <th>Price</th>
                                        <th>Extra Price Title</th>
                                        <th>Extra Price </th>
                                        <th>Category</th>
                                         <th>Image</th>
										<th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
        </thead>
        
      
								
								
        <tbody>
               <?php 
           $all_product = view('products','','','');
								$i = 0;
								foreach ($all_product as $all_pro) {
                                 $i++;
								?>
             <tr>
                                             <td><?php echo $i; ?></td>
                                            <td><?php echo $all_pro['title']; ?></td>
                                            
											
											<td><a href='#' style="color:red" data-status="<?php echo $all_pro['status'];?>" id='<?php echo $all_pro['id'];?>' class='change_status'><button class='btn <?php echo $all_pro['status']==1 ? 'btn-success' : 'btn-danger'; ?>'><?php echo $all_pro['status']==1 ? 'Activated' : 'Deactivated'; ?></button></a></td>
											
                                            <td><?php echo $all_pro['price']; ?></td>
                                            <td><?php echo $all_pro['ex_title']; ?></td>
                                                 <td><?php echo $all_pro['ex_price']; ?></td>
                                                 <td><?php echo $all_pro['category']; ?></td>
                                            <td><img style="width:150px;height:80px" src="<?php echo $all_pro['image']; ?>"></td>
									 <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><a href="<?php echo 'update_Product.php?id='.$all_pro['id'];  ?>"><span class="glyphicon glyphicon-pencil btn btn-primary btn-xs"></span></a></p></td>
										   
										   
                                           <td><a id="test" onclick='return window.confirm("Are you sure you want to delete this?");' class="btn btn-warning btn-xs glyphicon glyphicon-trash" href="<?php echo 'all_product.php?id='.$all_pro['id']; ?>"></a></td>
                                        </tr>	
        <?php
        
        }
        ?>
        </tbody>
        <tfoot>
            <tr class="table-success">
                                          <th>S.NO</th>
                                        <th>Product</th>
										 <th>Status</th>
                                        <th>Price</th>
                                        <th>Extra Price Title</th>
                                        <th>Extra Price </th>
                                        <th>Category</th>
                                         <th>Image</th>
										<th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
        </tfoot>

    
    
                           
                            </table>
                    </form>
	
       <br class="clear">
                </div>
            </div>


                </div>
              </div>
            </div>
          </div>

        </div>
		
		
		  <script>

    $('body').on('click','.change_status',function(e){
        var status = jQuery(this).data('status');
        var id = $(this).attr('id');
		var that = jQuery(this);
        $.ajax({
            url:'status_product.php',
            type:'post',
			beforeSend:function(){
				  that.find('button').prop('disabled',true);
			},
            async:false,
            data:{
                status:status,
                id:id
            },
            success:function(data){
				var obj = jQuery.parseJSON(data);
				that.find('button').text(obj.status);
				if( that.find('button').hasClass('btn-danger') ){
					that.find('button').removeClass('btn-danger').addClass('btn-success');
				}else{
					that.find('button').removeClass('btn-success').addClass('btn-danger');
				}
            },
			complete: function() {
				that.find('button').prop('disabled',false);
			}
        });
    });
        </script>
	
	 <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    	
		
<?php include('footer.php');?>
       
