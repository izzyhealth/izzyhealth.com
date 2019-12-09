<?php 
include 'config.php';
if(isset($_POST['status']))
{
    $status = $_POST['status'];
    $id = $_POST['id'];
    $sql1 = "select * from blog where id=$id";
    $result = mysqli_query($mysqli,$sql1);

    while($row = mysqli_fetch_array($result))
    {
       
        $status_var = $row['status'];
        if($status_var == 0)
        {
            $status_state = 1;
        }
        else
        {
            $status_state = 0;
        }
    }
	$status_name = $status_state == 1 ? 'Activated' : 'Deactivated';
	$class = $status_state == 1 ? 'btn-success' : 'btn-danger';
     //echo $status_var.'test';
    $sql = "update blog set status='".$status_state."' where id='".$id."'";
    //echo $sql;
    $result = mysqli_query($mysqli,$sql);
    if($result)
    {
        echo json_encode(['response'=>'success','status'=>$status_name,'class'=>$class]);
    }
    else
    {
        echo json_encode(['response'=>'failed']);
    }
}