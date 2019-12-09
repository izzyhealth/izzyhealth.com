<?php include('menu.php');?>

      <!-- top navigation -->
      <?php
      if (isset($_GET['id'])) {
	$id = $_GET['id'];
    $deleted = delete('product_category',"id=$id");
	if($deleted){
		echo "<script>window.location='add_category.php';</script>";
	}
  } 
?>
      
      <!-- /top navigation -->
<?php if(isset($_POST['add_category'])){
    
     $image = $_FILES['product_image']['name'];
	$expbanner = explode('.',$image);
	$bannerexptype=$expbanner[1];
	$date = date("h:i:sa");
    $rand=rand(10000,99999);
    $encname=$date.$rand;
    $bannername=md5($encname).'.'.$bannerexptype;
    

     $data = array(
	 'title'    =>  $_POST['cat_title'],
	  'cat_image'    =>  'uploads/product/'.$bannername,
	 );
	 
	 $ins = insert('product_category',$data);

	  if($ins){
	      upload('product_image','uploads/product/',$bannername);
  
   $success_msz = 'Successfully Added.';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
  }else{
    $error_msz = '<strong>Failed!</strong> ..Please try again';
  echo  '<div class="alert alert-warning" role="alert">'.$error_msz.'</div>';
  }
	
}; ?>
      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="margin-bottom:350px;">
                <div class="x_title">
                  <h2>Add Category <small></small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
 <div class="col-sm-6">
                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >

                  
                    <span class="section">Add Category</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Title<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="cat_title" placeholder="Category Title" required="required" type="text">
                      </div>
                    </div>
                   	<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Product Image<span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input type="file" class="form-control col-md-7 col-xs-12" name="product_image" id="nk_file" required>
							   </div>
							</div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="add_category" class="btn btn-success" value="Submit">
                      </div>
                    </div>
                  </form>
</div>
 <div class="col-sm-6">
      <span class="section">Category List</span>
      
      <?php
      $category = view('product_category','','','');
     
      ?>
      
       <table class="table table-bordred table-striped table-hover table-condensed">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col" id="sr_no" class="manage-column column-username"><span>S.NO</span><span class="sorting-indicator"></span></th>
                                        <th scope="col" id="username" class="manage-column column-username"><span>Name</span><span class="sorting-indicator"></span></th>
                                        <th scope="col" id="username" class="manage-column column-username"><span>Image</span><span class="sorting-indicator"></span></th>
										<th scope="col" id="Edit" class="">Edit</th>
                                        <th scope="col" id="Delete" class="">Delete</th>
                                    </tr>
                                </thead>
                                <?php 
								$i = 0;
								foreach ( $category as  $cat) {
                                 $i++;
								?>
                                    <tbody id="the-list" data-ci-lists="list:user">
                                        <tr id="user-1">
                                            <th scope="row" class="check-column"><?php echo $i; ?></th>
                                            <td class="name column-name" data-colname="Name"><?php echo $cat['title']; ?></td>
                                           <td class="name column-name" data-colname="Name"><img style="width:50px;height:50px" src="<?php echo $cat['cat_image']; ?>"</td>  
											
                                         <!--  <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><a href="<?php //echo site_url('admin/edit_row/?id='.$project->pro_id);  ?>"><span class="glyphicon glyphicon-pencil btn btn-primary btn-xs"></span></a></p></td>-->
										   <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><a href="<?php echo 'procat_update.php?id='.$cat[id];  ?>"><span class="glyphicon glyphicon-pencil btn btn-primary btn-xs"></span></a></p></td>
										   
										   
                                           <td><a id="test" onclick='return window.confirm("Are you sure you want to delete this?");' class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="<?php echo 'add_category.php?id='.$cat[id]; ?>"></a></td>
                                        </tr>	
                                    </tbody>
                                <?php } ?>	


                                <thead>
                                     <tr class="table-success">
                                        <th scope="col" id="sr_no" class="manage-column column-username"><span>S.NO</span><span class="sorting-indicator"></span></th>
                                        <th scope="col" id="username" class="manage-column column-username"><span>Name</span><span class="sorting-indicator"></span></th>
                                         <th scope="col" id="username" class="manage-column column-username"><span>Image</span><span class="sorting-indicator"></span></th>
                                      
										<th scope="col" id="Edit" class="">Edit</th>
                                        <th scope="col" id="Delete" class="">Delete</th>
                                    </tr>
                                </thead>
                            </table>
     </div>
                </div>
              </div>
            </div>
          </div>
        </div>

       <?php include('footer.php');?>