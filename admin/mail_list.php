<?php include('menu.php');?>
 <!-- top navigation -->
 <?php 
 $limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

$mail = view('subscribe','','','');
/* echo "<pre>";
print_r($events);
echo "</pre>"; */
//exit();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
    $deleted = delete('subscribe',"id=$id");
	if($deleted){
		echo "<script>window.location='mail_list.php';</script>";
	}
  }  
?>
	  <?php 
	 
  if(!empty($_SESSION['success_ml'])){
	  echo $_SESSION['success_ml'];
  }
  if(!empty($_SESSION['error_ml'])){
	  echo $_SESSION['error_ml'];
  }
   unset($_SESSION['success_ml']);
   unset($_SESSION['error_ml']);
  ?>
<div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                    Mail List
                    <small>
                        Show all Subscriber
                    </small>
                </h3>
            </div>

          
          </div>
          <div class="clearfix"></div>


          <div class="row">
	

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Mail <small>Information</small></h2>
                 
                  <div class="clearfix"></div>
		
                </div>

                <div class="x_content">

               
<div class="row">
            <div class="col-lg-12">
   <div class="table-responsive">
                       <form method="post" action="del_mail.php" onsubmit="return deleteConfirm();">
                       
                            <table class="table table-bordered table-striped js-dataTable-simple">
                                  <thead>
								  <tr>
								
                                     <tr class="table-success">
									 
                                        <th scope="col" id="sr_no" class="manage-column column-username" style="width: 12%;">
										
										 <input type="checkbox" name="check_all" id="check_all" value="">
										<label for="check_all"></label>
										<input type="submit" class="btn btn-primary" name="btn_delete" value="Delete"/>
										
										</th>
                                      
                                        <th scope="col" id="name" class="manage-column column-name sortable desc"><span>Email</span><span class="sorting-indicator"></span></th>
                                      
                                        <th scope="col" id="Delete" class="">Delete</th>
                                    </tr>
                                </thead>
                                <?php 
								
								foreach ($mail as $email) {
                                
								?>
                                    <tbody id="the-list" data-ci-lists="list:user">
                                        <tr id="user-1">
                                            <th scope="row" class="check-column">
											<div class="">
											<p>
											<input id="<?php echo $email['id']; ?>" type="checkbox" name="selected_id[]" class="checkbox" value="<?php echo $email['id']; ?>"/>
											  <label for="<?php echo $email['id']; ?>"></label>
											</p>
											</div>
											</th>
                                           
                                            <td class="name column-name" data-colname="email">
											<?php echo $email['email']; ?></td>
                                           
                                           <td><a id="test" onclick='return window.confirm("Are you sure you want to delete this?");' class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="<?php echo 'mail_list.php?id='.$email['id']; ?>"></a></td>
                                        </tr>	
                                    </tbody>
                                <?php } ?>	


                               
                            </table>

                    </form>
					<script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Do you really want to delete records?");
    if(result){
        return true;
    }else{
        return false;
    }
}
$(document).ready(function(){
    $('#check_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
        }else{
            $('#check_all').prop('checked',false);
        }
    });
});
</script>
					<style>
th.check-column {
    text-align: center;
}

input[type="checkbox"] {
  visibility: hidden;
}
label {
  cursor: pointer;
}
input[type="checkbox"] + label:before {
  border: 1px solid #333;
  content: "\00a0";
  display: inline-block;
  font: 16px/1em sans-serif;
  height: 16px;
  margin: 0 .25em 0 0;
  padding: 0;
  vertical-align: top;
  width: 16px;
}
input[type="checkbox"]:checked + label:before {
  background: #fff;
  color: #333;
  content: "\2713";
  text-align: center;
}
input[type="checkbox"]:checked + label:after {
  font-weight: bold;
}

input[type="checkbox"]:focus + label::before {
    outline: rgb(59, 153, 252) auto 5px;
}
</style>
<?php  
$sql = "SELECT COUNT(id) FROM subscribe";  
$rs_result = mysqli_query($mysqli, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
?>
 <ul class="pagination">
        <li><a href="?page=1">First</a></li>
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
        </li>
        <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
    </ul>




                    <br class="clear">
                </div>
            </div>


                </div>
              </div>
            </div>
          </div>

        </div>
<?php include('footer.php');?>
       
