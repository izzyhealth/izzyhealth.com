<?php include('menu.php');?>
<?php 
	   $id = 1;
	if(isset($_POST['update_profile_btn'])){
	  $image1 = $_FILES['profile']['name'];
	$expbanner1 = explode('.',$image1);
	$bannerexptype1=$expbanner1[1];
	$date1 = date("h:i:sa");
    $rand1=rand(10000,99999);
    $encname1=$date1.$rand1;
    $bannername1=md5($encname1).'.'.$bannerexptype1;
	
	
	
	
	if(!empty($_FILES['profile']['name'])){
		 $data = array(
	 'profile'    =>  'uploads/adminprofile/'.$bannername1,
	
	 );
}

	  $ins = update('admin_profile',$id,$data);
	

	  if($ins){
	   upload('profile','uploads/adminprofile/',$bannername1);
	  
	  
   $success_msz = 'Successfully Updated..';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
  }else{
    $error_msz = '<strong>Warning..!</strong> Please select any new image';
  echo  '<div class="alert alert-warning" role="alert">'.$error_msz.'</div>';
  }
	
} ?>

 <!-- top navigation -->
  <style>
.img_image img {
    width: 100%;
}
</style>  
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main" >
        <div class="img_image" style="text-align:center">
             <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">

                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >

                   <?php
				  $data=view('admin_profile',$id,'','');
				  
				  foreach($data as $row){
				
						
				  ?>
                    <span class="section">Profile Setting</span>

                    
                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Profile">Profile Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="file" class="form-control col-md-7 col-xs-12" value="" name="profile" id="nk_file">
					   
					    <img src="<?php echo $row[1];?>" width="50%" height="150px" class="pro_file" style="
    padding: 23px;
    margin-top: 10px;">
                      </div>
					  
					  
                    </div>
					   
                  
					   
                    
                  
					
				
                  
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="update_profile_btn" class="btn btn-success btn-lg" value="Update">
                      </div>
                    </div>
                  </form>
<?php } ?>
                </div>
              </div>
            </div>
         

        </div>
<?php include('footer.php');?>
       
