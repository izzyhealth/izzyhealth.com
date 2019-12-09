<?php include('menu.php');?>

      <!-- top navigation -->
      
      <!-- /top navigation -->
<?php
$id = $_GET['id'];
if(isset($_POST['update_category'])){
    
     $image = $_FILES['product_image']['name'];
	$expbanner = explode('.',$image);
	$bannerexptype=$expbanner[1];
	$date = date("h:i:sa");
    $rand=rand(10000,99999);
    $encname=$date.$rand;
    $bannername=md5($encname).'.'.$bannerexptype;
    
    if(empty($_FILES['product_image']['name'])){
     $data = array(
	 'title'    =>  $_POST['cat_title'],
	 );
    }else{
    $data = array(
	 'title'    =>  $_POST['cat_title'],
	 'image'    =>  'uploads/product/'.$bannername,
	 );
	
    }
	 
	$ins = update('product_category',$id,$data);
	 if($ins){
		 upload('product_image','uploads/product/',$bannername);
   $success_msz = 'Your update is successful.';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
	 }
	
}; ?>
      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Update Category
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Category <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                       
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
 <div class="col-sm-6">
      <?php
      $opd_category = view('product_category',"id=$id",'','');
     
      ?>
                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >

                  
                    <span class="section">Update Category</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Title<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                          foreach($opd_category as $opd_cat){
                          ?>
                        <input class="form-control col-md-7 col-xs-12" value="<?php echo $opd_cat['title'];?>" name="cat_title" placeholder="Category Title" required="required" type="text">
                        <?php } ?>
                      </div>
                    </div>
                    
                    	<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Product Image<span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input type="file" class="form-control col-md-7 col-xs-12" value="" name="product_image" id="nk_file" >
							   </div>
							</div>
							
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="update_category" class="btn btn-success" value="Update">
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