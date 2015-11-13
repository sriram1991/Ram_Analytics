<?php
if(file_exists("/var/lock/ask_sendmail")){
    echo "Ask analytics Send Mail Already Running Time:".date("Y-M-d H:m:s")."\n";
    exit();
}

require_once "Mail.php";
// DATA BASE Constatns
$username="askadmin";
$password="askadmin@123#";
$hostname="localhost";
$DB_NAME = "ask_analytics_db";
//$port="465";
$dbhandle = mysql_connect($hostname,$username,$password) or die("unable to connect to Mysql");
echo "\n";
echo "ASK Email Script Started --------------------\n";
// Creating Touch file
touch("/var/lock/ask_sendmail");
echo "Start Time: ".date("Y-M-d H:m:s")."\n";
echo "connected to Mysql<br> \n";
$selected=mysql_select_db($DB_NAME,$dbhandle) or die("could not select ".$DB_NAME);
$result = mysql_query("select id,email_id,email_subject,email_body from send_email");
$num_rows = mysql_num_rows($result);
$count = 0;
if($num_rows > 0) {
	while ($row = mysql_fetch_array($result)) {
		$status = send_mail('askanalytics02@gmail.com',$row{'email_id'},$row{'email_subject'},$row{'email_body'});
	
		if($status == 1) {
			// delete the record
	        $row_id = $row{'id'};
        	$query  = mysql_query("delete from send_email where id='$row_id'");
		  	// if($query==false){ break; }
		  $count++;
		} else {
		   //exit this script
           $row_id = $row{'id'};
           $query = mysql_query("update send_email set invalid = '1' where id='$row_id'");
           if($query==false) {
            echo "DB: Error Failed to update invalid email :".$row{'email_id'};
           }
		   echo "Email Sending Failed \n";
		   echo $status."\n";	
		   // break;
		}
	}
} else {
  	echo "There is no emails remaining all sent successfully ! <br> \n";
}
echo "No of Email Sent : ".$count."\n";
mysql_close($dbhandle);
unlink("/var/lock/ask_sendmail");
echo "Start Time: ".date("Y-M-d H:m:s")."\n";
echo "ASK Email Script Ended --------------------\n";

// user defined function
function send_mail($from_add,$to_add,$email_subject,$msg_body) {
	$from 	= $from_add;
	$to 	= $to_add;	
	$body 	= $msg_body;
	$subject= $email_subject;	
	$host 	= "ssl://smtp.gmail.com";
    $port 	= "465";
	$user_name 	   = "askanalytics02@gmail.com";
	$user_password = "askadmin123";
	$headers=array('From' =>$from,'To' =>$to,'Subject' =>$subject,'MIME-Version' => "1.0",'Content-type' => "text/html; charset=iso-8859-1\r\n\r\n");

	$smtp=Mail::factory('smtp',array('host' =>$host,'port' => $port,'auth' => true,'username'=> $user_name,'password' => $user_password));
	
	$mail = $smtp->send($to,$headers,$body);
	if(PEAR::isError($mail)){
  		//echo("<p>". $mail->getmessage() . "</p>");
  		return $mail->getmessage();
	} else {
  		echo "<p>Message sent successfully to ".$to." </p> \n";
  		return true;	
	}
}

?>
