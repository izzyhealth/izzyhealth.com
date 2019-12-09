<?php include('menu.php');?>

      <!-- top navigation -->
      
      <!-- /top navigation -->

      <!-- page content -->
    <?php 
	   $id = 1;
	if(isset($_POST['update_logo_btn'])){
	  $image1 = $_FILES['header_logo']['name'];
	$expbanner1 = explode('.',$image1);
	$bannerexptype1=$expbanner1[1];
	$date1 = date("h:i:sa");
    $rand1=rand(10000,99999);
    $encname1=$date1.$rand1;
    $bannername1=md5($encname1).'.'.$bannerexptype1;
	
	
	$image3 = $_FILES['footer_logo']['name'];
	$expbanner3 = explode('.',$image);
	$bannerexptype3=$expbanner3[1];
	$date3 = date("h:i:sa");
    $rand3=rand(10000,99999);
    $encname3=$date3.$rand3;
    $bannername3=md5($encname3).'.'.$bannerexptype3;
	
	
	if(!empty($_FILES['header_logo']['name']) && !empty($_FILES['footer_logo']['name'])){
		 $data = array(
	 'header_logo'    =>  'uploads/logos/'.$bannername1,
	 'footer_logo'    =>  'uploads/logos/'.$bannername3,
	 );
}
if(empty($_FILES['header_logo']['name']) && empty($_FILES['footer_logo']['name'])){
		echo '<div class="alert alert-info">
  <strong>Info!</strong> you are not select any image.Please select one Logo if you want to change.
</div>';
}

if(!empty($_FILES['header_logo']['name']) && empty($_FILES['footer_logo']['name'])){
		 $data = array(
	 'header_logo'    =>  'uploads/logos/'.$bannername1,
	
	 );
}

if(!empty($_FILES['footer_logo']['name']) && empty($_FILES['header_logo']['name'])){
		 $data = array(
	  'footer_logo'    =>  'uploads/logos/'.$bannername3,
	
	 );
}




	  $ins = update('logo',$id,$data);
	

	  if($ins){
	   upload('header_logo','uploads/logos/',$bannername1);
	   upload('footer_logo','uploads/logos/',$bannername3);
	  
   $success_msz = 'Successfully Updated..';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
  }else{
    $error_msz = '<strong>Failed!</strong> ..Please try again';
  echo  '<div class="alert alert-warning" role="alert">'.$error_msz.'</div>';
  }
	
} ?>
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Logo Detail
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                
                <div class="x_content">

                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >

                   <?php
				  $data=view('logo',$id,'','');
				  
				  foreach($data as $row){
				
						
				  ?>
                    <span class="section">Logo Info</span>

                    
                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Header Logo">Header Logo Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="file" class="form-control col-md-7 col-xs-12" value="" name="header_logo" id="nk_file">
					   
					    <img src="/admin/<?php echo $row[1];?>" width="100%" height="150px"  style="background: #0000007a;
    padding: 23px;">
                      </div>
					  
					  
                    </div>
					   
                   <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Footer Logo">Footer Logo Image<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="file" class="form-control col-md-7 col-xs-12" value="" name="footer_logo" id="nk_file">
					   
					    <img src="/admin/<?php echo $row[2];?>" width="100%" height="150px" style="background: #0000007a;
    padding: 23px;">
                      </div>
					  
					  
                    </div>
					   
                    
                  
					
				
                  
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="update_logo_btn" class="btn btn-success btn-lg" value="Update">
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