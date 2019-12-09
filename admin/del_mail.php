<?php
    session_start();
    include_once('config.php');
    if (!empty($_POST["selected_id"]) > 0 ) {
      $all = implode(",", $_POST["selected_id"]);
      $query="DELETE FROM subcribe WHERE 1 AND id IN($all)";
      if(mysqli_query($mysqli,$query)){
          $_SESSION['success_ml'] = '<div class="alert alert-success"><strong>Success!</strong> Mail have been deleted successfully.</div>';
      }
    }else{
        $_SESSION['error_ml'] = '<div class="alert alert-warning"><strong>Warning!</strong> Select checkbox to delete mail.</div>';
		
		header("Location:mail_list.php");
    }
    header("Location:mail_list.php");
	
	
	
	 if (!empty($_POST["selected_id_enq"]) > 0 ) {
      $all = implode(",", $_POST["selected_id_enq"]);
      $query="DELETE FROM subcribe WHERE 1 AND id IN($all)";
      if(mysqli_query($mysqli,$query)){
          $_SESSION['success_enq'] = '<div class="alert alert-success"><strong>Success!</strong> Mail have been deleted successfully.</div>';
      }
    }else{
        $_SESSION['error_enq'] = '<div class="alert alert-warning"><strong>Warning!</strong> Select checkbox to delete mail.</div>';
		
		header("Location:mail_list.php");
    }
    header("Location:mail_list.php");
	
	
	
	if (!empty($_POST["selected_id_gnenq"]) > 0 ) {
      $all = implode(",", $_POST["selected_id_gnenq"]);
      $query="DELETE FROM subcribe WHERE 1 AND id IN($all)";
      if(mysqli_query($mysqli,$query)){
          $_SESSION['success_gnenq'] = '<div class="alert alert-success"><strong>Success!</strong> Mail have been deleted successfully.</div>';
      }
    }else{
        $_SESSION['error_gnenq'] = '<div class="alert alert-warning"><strong>Warning!</strong> Select checkbox to delete mail.</div>';
		
		header("Location:mail_list.php");
    }
    header("Location:mail_list.php");
	
	
	
	
?>