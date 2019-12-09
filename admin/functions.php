<?php
	include('config.php');
    error_reporting(1);
/*======================================================== Login Function ==================================================================================*/

function user_login($tablename,$val){
	global $mysqli;
	$sel = "select * from $tablename where email = '$val[email]'  and password = '".trim(md5($val['password']))."' and status = '1'";
	
	$query = $mysqli->query($sel);
	$_SESSION['auth'] = array();
	if($query->num_rows >= 1){
		$d = $query->fetch_array(MYSQLI_BOTH);
		$_SESSION['auth']['user_id'] = $d['id'];
		$_SESSION['auth']['email'] = $d['email'];
		echo "<script>window.location='profile.php';</script>";
	}else{
		echo "<span style='color:red;'>Login Details Invalid Please try Again</span>";
	}
	
}

/* ======================= END =============================================*/


/*======================================================== Upload Function ==================================================================================*/
function upload($file_name='',$folder_name,$image_name){
         $target_file = $folder_name."".$image_name;
		
         $uploadOk = 1;
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         $check = getimagesize($_FILES[$file_name]["tmp_name"]);
         if($check !== false) {
  move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_file);
         $uploadOk = 1;
         } else {
         $uploadOk = 0;
         }
}
/* ======================= END =============================================*/



/*======================================================== Multi Upload Function ==================================================================================*/
/*function multi_upload($file_name='',$folder_name){
          //$target_dir = "uploads/events/";
          
           foreach($file_name as $key=>$val){
            // File upload path
            $target_file = basename($_FILES[$file_name]["name"][$key]);
            $uploadOk = 1;
             $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         $check = getimagesize($_FILES[$file_name]["tmp_name"]);
         if($check !== false) {
         //echo "File is an image - " . $check["mime"] . ".";
  move_uploaded_file($_FILES[$file_name]["tmp_name"][$key], $target_file);
         $uploadOk = 1;
         } else {
         echo "File is not an image.";
         $uploadOk = 0;
         }
        }
}*/
/* ======================= END =============================================*/





function update($table, $id, $fields) {
 global $mysqli;
    $set = '';
    $x = 1;

    foreach($fields as $name => $value) {
        $set .= "{$name} = \"{$value}\"";
        if($x < count($fields)) {
            $set .= ',';
        }
        $x++;
    }

     $sql = "UPDATE $table SET $set WHERE id = $id";
 //exit();

    $update = $mysqli->query($sql);
 if($update){
        return true;
    }

    return false;
}




/* ================================================================= Global Function ========================================================================*/

function insert($tableName,$data){
	global $mysqli;
	if(isset($data)){
		foreach($data as $key=>$value){
			$keyy .= $key.',';
			$valuee .= "'".$value."',";
		}
		 $value = rtrim($valuee, ',');
		 $key = rtrim($keyy, ',');
	}
	 $ins = "insert into $tableName($key)values($value)";
	$query = $mysqli->query($ins);
	if($query){
		return true;
	} else {
	  echo("Error description: " . mysqli_error($mysqli));
	  }
}

function view($tableName,$where,$limit,$orderBy){
	global $mysqli;
	$sel = "select * from $tableName";

	if(!empty($where)){
		$sel .= " where $where";
	}
if(!empty($orderBy)){
     $sel .= " ORDER BY id desc";
		
	}else{	
	 $sel .= " ORDER BY id asc";
	}
	if(!empty($limit)){
		$sel .= " LIMIT $limit";
	}
	//echo $sel;
	//exit();
	$query = $mysqli->query($sel);
	$value = array();
	while($d = $query->fetch_array(MYSQLI_BOTH)){
		$value[] = $d;
	}
	return $value;
}

function delete($tableName,$where){
	global $mysqli;
	$del = "DELETE from $tableName";
	$del .= " where $where";
	$query = $mysqli->query($del);
	return $query;
}

function logout(){
	session_start();
    session_destroy();
    //header("location:/login.php");
	echo "<script>window.location='login.php';</script>";
    exit();

}
	
?>