<?php include('menu.php');?>

      <!-- top navigation -->
      
      <!-- /top navigation -->
<?php if(isset($_POST['add_product'])){

      $image = $_FILES['product_image']['name'];
	$expbanner = explode('.',$image);
	$bannerexptype=$expbanner[1];
	$date = date("h:i:sa");
    $rand=rand(10000,99999);
    $encname=$date.$rand;
    $bannername=md5($encname).'.'.$bannerexptype;
	
     $data = array(
	 'title'    =>  $_POST['product_title'],
	 'category	'    =>  $_POST['category'],
	 'description'    =>  $_POST['product_description'],
	  'price'    =>  $_POST['price'],
	   'image'    =>  'uploads/product/'.$bannername,
	   'product_code' => rand(1, 1000000),
	    'ex_title' => $_POST['ex_title'],
	     'ex_price' => $_POST['ex_price'],
	   'status'  => 1
	
	 );
	 
	 $ins = insert('products',$data);

	  if($ins){
	       if($ins){
   upload('product_image','uploads/product/',$bannername);
   $success_msz = 'Successfully Added.';
  echo  '<div class="alert alert-success" role="alert">'.$success_msz.'</div>';
  }else{
    $error_msz = '<strong>Failed!</strong> ..Please try again';
  echo  '<div class="alert alert-warning" role="alert">'.$error_msz.'</div>';
  }
  
	
}

    
}
?>
      <!-- page content -->
      <div class="right_col" role="main">

        
		 <div class="">
         <div class="page-title">
            <div class="title_left">
              <h3>
                   Products
                    <small>
                         Add All products which shows on shop page
                    </small>
                </h3>
            </div>

          
          </div>
		<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="margin-bottom:140px;">
                <div class="x_title">
                  <h2>Add Product <small></small></h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
           <div class="row">
            <div class="col-lg-12">
                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >
								<div class="table-responsive">			 
							 <div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input class="form-control col-md-7 col-xs-12" name="product_title" placeholder="Product Title" required="required" type="text">
							   </div>
							</div>
							<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required"></span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <textarea class="form-control col-md-7 col-xs-12" name="product_description" placeholder="Product Description" type="text"></textarea>
							   </div>
							</div>
							<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price <span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input class="form-control col-md-7 col-xs-12" name="price" placeholder="Price" required="required" type="text">
							   </div>
							</div>
							
								<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Extra Price Title <span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input class="form-control col-md-7 col-xs-12" name="ex_title" placeholder="Extra Price Title " required="required" type="text">
							   </div>
							</div>
							
								<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Extra Price <span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <input class="form-control col-md-7 col-xs-12" name="ex_price" placeholder="Extra Price" required="required" type="text">
							   </div>
							</div>
						
							<?php
							   $category = view('product_category','','','');
							   
								  ?>
							<div class="item form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category<span class="required">*</span>
							   </label>
							   <div class="col-md-6 col-sm-6 col-xs-12">
								  <select class="form-control col-md-7 col-xs-12" name="category" placeholder="Category" required="required" type="text">
									 <?php
										foreach ( $category as  $cat) {
										?>
									 <option value="<?php echo $cat['title']?>"><?php echo $cat['title']?></option>
									 <?php } ?>
								  </select>
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
								  <input type="submit" name ="add_product" class="btn btn-success" value="Submit">
							   </div>
							</div>
							</div>
                  </form>
          <br class="clear">
                </div>
            </div>


                </div>
              </div>
            </div>
          </div>

        </div>
		
       <?php include('footer.php');?>