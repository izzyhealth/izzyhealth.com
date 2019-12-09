<?php include('menu.php');?>

       
<div class="right_col" role="main">
        <div class="">

          <div class="clearfix"></div>


          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Orders Details</small></h2>
                 
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">

               
<div class="row">
            <div class="col-lg-12">
                        
                  <?php
                  $id = $_GET['id'];
              
               $result = $mysqli->query("SELECT orders.*,customers.firstname,customers.lastname,customers.email,customers.mobile,customers.country,customers.state,customers.zip,customers.address1,customers.address2 FROM orders
									 left join customers on customers.id = orders.customer_id  where customer_id = $id"); 
                                   
                              if(!$result->num_rows > 0){ echo '<h2 style="text-align:center;">No Data Faund</h2>'; }
                              
                              ?>
                               <?php
                                  $result1 = $mysqli->query("SELECT orders.*,customers.firstname,customers.lastname,customers.email,customers.mobile,customers.country,customers.state,customers.zip,customers.address1,customers.address2 FROM orders
									 left join customers on customers.id = orders.customer_id where customer_id = $id "); 
                    
                          $or = 0;
                          
                                    while($row1 = $result1->fetch_assoc())
                                        {
                                          if($or == 0){ 
                                         
                                          ?>
                               
                                     <div class="col-sm-6"> <h2>User Details</h2>
       <table class="table table-bordered">
        
             <tr>
            <th>Name : </th>
            <th><?php echo $row1[firstname] ?> <?php echo $row1[lastname] ?>
            </th>
             </tr>
              <tr>
            <th>Email : </th>
            <th><?php echo $row1[email] ?></th>
             </tr>
              <tr>
            <th>Mobile : </th>
            <th><?php echo $row1[mobile] ?></th>
          </tr>
              </table>
           </div>
      
        <div class="col-sm-6"> <h2>Billing Details</h2>
         <table class="table table-bordered">
           
            
           <tr>
            <th>Address1 : </th><th><?php echo $row1[address1] ?></th>
           </tr><tr>
            <th>Address2 : </th><th><?php echo $row1[address2] ?></th>
            </tr><tr>
            <th>Country : </th><th><?php echo $row1[country] ?></th>
           </tr><tr>
             <th>State : </th><th><?php echo $row1[state] ?></th>
            </tr><tr>
              <th>ZipCode : </th><th><?php echo $row1[zip] ?></th>
          </tr>
          <?php 
          } 
          $or++;
                          }              
          ?>
           </table>
          </div>
          
           
          
          <table class="table table-bordered">
              <center><div class="row"> <h2>Iteams Details</h2></div></center>
           </thead>
          <tr>
            <th>S.No.</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
                              <?php
                               $i =1;
                                    while($row = $result->fetch_assoc())
                                        {
                                           
                                         
                                          ?>
                                          
                                           
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['itam_name']; ?></td>
            <td><?php echo $row['itam_qty']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['created']; ?></td>
         
            <td><span class="label label-info">
                <?php if($row['status']==1)
                {?>
                Paid
                <?php
                }else{
                ?> Unpaid <?php
                }?>
                </span></td>
          </tr>
       
                                          
                                          <?php
                                           
                                        $i++;    
  
                                        }
                                      ?>
 </tbody>
      </table>
                    <br class="clear">
                </div>
            </div>


                </div>
              </div>
            </div>
          </div>

        </div>
<?php include('footer.php');?>
       
