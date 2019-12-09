<?php include('menu.php');?>

      <!-- top navigation -->
      
      <!-- /top navigation -->

      <!-- page content -->
    <?php 
	   $id = 1;
	if(isset($_POST['update_site_title'])){
		$image = $_FILES['image']['name'];
	$expbanner ='favicon.ico';
	$bannername=$expbanner;
	
		
if(empty($_FILES['image']['name'])){
     $data = array(
	 'title'    =>  $_POST['title'],
	
	 );
}else{

 $data = array(
	 'title'    =>  $_POST['title'],
	 'image'     =>  $bannername
 );
}
	  $ins = update('site_title',$id,$data);
     if($ins){
   upload('image','','../'.$bannername);
   $success_msz = 'Successfully Updated..';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
  }else{
    $error_msz = '<strong>Failed!</strong> ..Please try again';
  echo  '<div class="alert alert-warning" role="alert">'.$error_msz.'</div>';
  }
	
}; ?>
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Site Title Detail
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="margin-bottom:130px;">
                
                <div class="x_content">

                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >

                   <?php
				  $data=view('site_title',$id,'','');
				  
				  foreach($data as $row){
				
						
				  ?>
                    <span class="section">Site Title Info</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="title" value="<?php echo $row[1];?>" placeholder="Title" required="required" type="text">
                      </div>
                    
                   </div>
                  
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Favicon Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="file" class="form-control col-md-7 col-xs-12" name="image" <?php echo $row[2];?> id="" >
                      </div>
                    </div>
                    <div class="item form-group">
                     <img src="../<?php echo $row[2];?>" width="100px" height="100px" style="margin: auto;
    display: inherit;">
                      
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="update_site_title" class="btn btn-success btn-lg" value="Update">
                      </div>
                    </div>
                  </form>
<?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

       <?php include('footer.php');?>