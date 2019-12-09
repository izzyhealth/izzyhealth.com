<?php include('user_menu.php');?>
 <!-- top navigation -->
 <?php 
 $id=$_GET['id'];

$products = view('product_url','id = '.$id,'','');
 
?>
<div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                    Product Detail
                    <small>
                        Show all Detail Of  Product
                    </small>
                </h3>
            </div>

          
          </div>
          <div class="clearfix"></div>


          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Product <small>Information</small></h2>
                 
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

               
            <div class="row">
			
			 <?php 
								
								foreach ( $products as  $product) {
                              
								?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                      <div class="item form-group">
                      <label class="col-md-6 col-sm-8 col-xs-12" for="name">Product ID
                      </label>
                      <div class="col-md-6 col-sm-8 col-xs-12">
                        <?php echo $product['id']; ?>
                      </div>
                    </div> 
					
					</br></br>
					
					 <div class="item form-group">
                      <label class="col-md-6 col-sm-8 col-xs-12" for="name">Product Link
                      </label>
                      <div class="col-md-6 col-sm-8 col-xs-12" style="overflow-wrap: break-word;
    word-wrap: break-word;
    -ms-word-break: break-all;
   
    word-break: break-word;">
                        <?php echo $product['link']; ?>
                      </div>
                    </div> 
					
					</br></br>
					
					<div class="item form-group">
                      <label class="col-md-6 col-sm-8 col-xs-12" for="name">Status
                      </label>
                      <div class="col-md-2 col-sm-4 col-xs-12">
                       <?php if($product[status]==1){
											echo "<p class='approve' style='text-align: center;'>Approved</p>";
                                                }else{
												echo "<p class='not_approve' style='text-align: center;'>Not Approved</p>";
												}    
                                            ?>
                      </div>
					  <div class="col-md-4 col-sm-4 col-xs-12"></div>
                    </div>
					</br></br>
					 <div class="item form-group">
                      <label class="control-label col-md-6 col-sm-6 col-xs-12" for="name">Product Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
              <img style="height: 200px;width: 200px;" src="<?php echo $product['image']; ?>">
                      </div>
                    </div> 
					
            </div>


                </div>
				
				<?php }?>
              </div>
            </div>
          </div>

        </div>
<?php include('footer.php');?>
       
