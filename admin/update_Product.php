<?php include('menu.php');?>

      <!-- top navigation -->
     
      <!-- /top navigation -->
<?php
$id = $_GET['id'];
if(isset($_POST['update_product'])){

  $image = $_FILES['product_image']['name'];
	$expbanner = explode('.',$image);
	$bannerexptype=$expbanner[1];
	$date = date("h:i:sa");
    $rand=rand(10000,99999);
    $encname=$date.$rand;
    $bannername=md5($encname).'.'.$bannerexptype;
	
if(empty($_FILES['product_image']['name'])){
     $data = array(
	 'title'    =>  $_POST['product_title'],
	 'category	'    =>  $_POST['category'],
	 'description'    =>  $_POST['product_description'],
	  'price'    =>  $_POST['price'],
	  'ex_title'    =>  $_POST['ex_title'],
    'ex_price'    =>  $_POST['ex_price'],
	  'status'  => 1
	
	
	 );
}else{
	 $data = array(
	 'title'    =>  $_POST['product_title'],
	 'category	'    =>  $_POST['category'],
	 'description'    =>  $_POST['product_description'],
	  'price'    =>  $_POST['price'],
	   'ex_title'    =>  $_POST['ex_title'],
     'ex_price'    =>  $_POST['ex_price'],
	 'image'    =>  'uploads/product/'.$bannername,
	 'status'  => 1
	
	 );
}
	 $ins = update('products',$id,$data);

	  if($ins){
	       if($ins){
   upload('product_image','uploads/product/',$bannername);
   $success_msz = 'Your update is successful.';
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
                     Update Product
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
                  <h2> Update Product <small></small></h2>
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

                  <form class="form-horizontal form-label-left" method ="post" action=" " enctype="multipart/form-data" >
<?php
      $products = view('products',"id=$id",'','');
      foreach($products as $product){
     
      ?>
                  
                    <span class="section"> Update Product Info</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12"  value="<?php echo $product['title'];?>" name="product_title" placeholder="Product Title" required="required" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Description <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="form-control col-md-7 col-xs-12"  value="<?php echo $product['description'];?>" name="product_description" placeholder="Product Description" type="text"> <?php echo $product['description'];?></textarea>
                      </div>
                    </div>
                    
                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Price <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="price"  value="<?php echo $product['price'];?>"  placeholder="Price" required="required" type="text">
                      </div>
                    </div>
                    
                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Extra Price Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="ex_title"  value="<?php echo $product['ex_title'];?>"  placeholder="Extra Price Title" type="text">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Extra Price  <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" name="ex_price"  value="<?php echo $product['ex_price'];?>"  placeholder="Extra Price" type="text">
                      </div>
                    </div>
                    <?php
      $category = view('product_category','','','');
     
      ?>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control col-md-7 col-xs-12"   name="category" placeholder="Category" required="required" type="text">
                              <option value="<?php echo $product['category'];?>"><?php echo $product['category'];?></option>
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
                       <input type="file" class="form-control col-md-7 col-xs-12"  value="<?php echo $product['product_image'];?>" name="product_image" id="nk_file" >
                      </div>
                    </div>
                    
                    
                  
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name ="update_product" class="btn btn-success" value="Submit">
                      </div>
                    </div>
                    <?php } ?>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

       <?php include('footer.php');?>