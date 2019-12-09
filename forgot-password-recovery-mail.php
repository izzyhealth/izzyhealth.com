<?php
$to = $user["email"];
$subject = "Password Recovery";
$emailBody = "<div> Dear" . $user["username"] . ",<br><br><p>Click this link to recover your password<br><a 
targate='blank' href='https://filchingrace.com/reset_password.php?name=" . $user["username"] . "&email=" . $user["email"] . "'>Click Here</a><br><br></p>Regards,<br> Brieanamayne</div>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: <contact@brieanamayne.com>' . "\r\n";

mail($to,$subject,$emailBody,$headers);

?>