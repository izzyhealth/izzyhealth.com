<?php include('user_menu.php');?>

      <!-- top navigation -->
      
      <!-- /top navigation -->
<?php
$id = $_GET['id'];
if(isset($_POST['update_category'])){

     $data = array(
	 'title'    =>  $_POST['cat_title'],
	 );
	 
	$ins = update('portfolio_category',$id,$data);
	 if($ins){
		 echo '<script type="text/javascript">alert("Thank You...")</script>';
	 }
	
}; ?>
      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
        
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Update Category <small></small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
 <div class="col-sm-6">
      <?php
      $opd_category = view('portfolio_category',"id=$id",'','');
     
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
      $category = view('portfolio_category','','','');
     
      ?>
      
       <table class="table table-bordred table-striped table-hover table-condensed">
                                <thead>
                                    <tr class="table-success">
                                        <th scope="col" id="sr_no" class="manage-column column-username"><span>S.NO</span><span class="sorting-indicator"></span></th>
                                        <th scope="col" id="username" class="manage-column column-username"><span>Name</span><span class="sorting-indicator"></span></th>
                                       
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
                                           
											
                                         <!--  <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><a href="<?php //echo site_url('admin/edit_row/?id='.$project->pro_id);  ?>"><span class="glyphicon glyphicon-pencil btn btn-primary btn-xs"></span></a></p></td>-->
										   <td><p data-placement="top" data-toggle="tooltip" title="" data-original-title="Edit"><a href="<?php echo 'cat_update.php?id='.$cat[id];  ?>"><span class="glyphicon glyphicon-pencil btn btn-primary btn-xs"></span></a></p></td>
										   
										   
                                           <td><a id="test" onclick='return window.confirm("Are you sure you want to delete this?");' class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="<?php echo 'portfolio_cat.php?id='.$cat[id]; ?>"></a></td>
                                        </tr>	
                                    </tbody>
                                <?php } ?>	


                                <thead>
                                     <tr class="table-success">
                                        <th scope="col" id="sr_no" class="manage-column column-username"><span>S.NO</span><span class="sorting-indicator"></span></th>
                                        <th scope="col" id="username" class="manage-column column-username"><span>Name</span><span class="sorting-indicator"></span></th>
                                      
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