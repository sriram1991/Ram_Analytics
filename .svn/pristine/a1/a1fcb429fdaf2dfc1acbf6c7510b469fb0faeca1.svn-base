<?php
// Functions DB_Connection SEND_SMS  SEND_EMAIL CHECK_SMS_STATUS
// DB Connection Parameter
$username="skoladmin";
$password="skol@123#";
$hostname="localhost";
$db_name = "skoldb";
//$port="465";
$sms_sent   = 0;
$sms_unsent = 0;
$email_sent = 0;
$sms_count  = 0;
// CHECK FOR DEMON LOCK
if(file_exists("/var/lock/skol_sendsms")){
    echo "SKOL Send SMS Already Running Time:".date("Y-M-d H:m:s")."\n";
    exit();
}
echo "SKOL SMS Script Started --------------------\n";
// Creating Touch Lock file
touch("/var/lock/skol_sendsms");
echo "Start Time: ".date("Y-M-d H:i:s")."\n";
// Connecting DB ::
$dbhandle = open_mysql_connection($hostname,$username,$password);
// Selecting DB
$selected = use_data_base($dbhandle,$db_name);
$sms_send = true;
if($sms_send != false){
// Fetech Record from student_test_schedule_view
$result   = mysql_query("SELECT * FROM student_test_schedule_view");
$num_rows = mysql_num_rows($result);

if($num_rows > 0) {
  while ($row = mysql_fetch_array($result)) {
    // collect user information
    $user_fname     = $row{'user_fname'};
    $email_id       = $row{'user_email'};
    $subject_title  = "SKOL Test remainder";
    $user_phone     = $row{'user_phone'};
    $message_body   = "Dear ".$row{'user_fname'}.", \nThere is an Test coming up in ".$row{'course_name'}." - ".$row{'subject_name'}." - ".$row{'test_name'}." on tomorrow Date ".$row{'schedule'}."\nAll The Best. \nThanks and Regards \nSKOL System \nadmin@skolsystem.com.";
    // send email
    $email_status   = SEND_EMAIL($email_id,$subject_title,$message_body);
    if($email_status){
      $email_sent++;
    }
    // send sms
    $schedule_id = SEND_SMS($user_phone,$message_body);
    if(isset($schedule_id)){
      $user_phone = trim($user_phone);
      $query  = mysql_query("insert into unsend_sms_alert(user_fname,email_id,user_phone,message_body,sms_response) values('".$user_fname."','".$email_id."',".$user_phone.",'".$message_body."','".$schedule_id."');");
      if(isset($query)){
        $sms_count++; 
      } else {
        echo "<p> Failed to update in unsent_sms_alert </p> \n";
      }
    }
  }
} else {
    echo "There is no SMS remainder all sent successfully ! <br> \n";
}

}
  // Check for sms status ---------------------------------- START --------------
  sleep(60);
  $result   = mysql_query("SELECT * FROM unsend_sms_alert ORDER BY id DESC;");
  $num_rows = mysql_num_rows($result);
  if($num_rows > 0) {
    while ($row = mysql_fetch_array($result)) {
      $schedule_id = $row{'sms_response'};
      $row_id = $row{'id'};
      echo "\n Checking sms status : ".$schedule_id." \n";
      $sms_status = CHECK_SMS_STATUS($schedule_id);
      if(strpos($sms_status, "DELIVRD") !== false){
        $query = mysql_query("DELETE FROM unsend_sms_alert WHERE id ='$row_id';");
        if($query == 1){
          $sms_sent++;
        } else {
          echo "DB Problem in deleting unsent sms alert !";
        }
      } else {
        $sms_unsent++;
        $query = mysql_query("UPDATE unsend_sms_alert SET sms_status = '$sms_status' WHERE id ='$row_id';");
      }
    }
  }
  // Check for sms status ---------------------------------- ENDED --------------

echo "\n";
echo "--Report---------------------------------\n";
echo "No of Email Sent     : ".$email_sent."\n";
echo "No of SMS Sent       : ".$sms_count."\n";
echo "No of SMS DELVRD     : ".$sms_sent."\n";
echo "No of SMS Not DELVRD : ".$sms_unsent."\n";
close_mysql_connection($dbhandle);
unlink("/var/lock/skol_sendsms");
echo "Start Time: ".date("Y-M-d H:i:s")."\n";
echo "SKOL SMS Script Ended --------------------\n";






// SEND EMAIL FUNCTION :
function SEND_EMAIL($to_address,$email_subject,$email_body){
  $query  = mysql_query("insert into send_email (email_id,email_subject,email_body) values ('".$to_address."','".$email_subject."','".$email_body."');");
  if($query!=false){ 
    return true; 
  }
  return false;
}

// SEND SMS FUNCTION :
function SEND_SMS($user_phone,$message_body){
  // SMS Configuration
  $signature  = "SKOL System www.services.skolsystem.com";
  $content    = stripcslashes($message_body);
  $content    = htmlentities($content,ENT_COMPAT);
  $SMS_URL    = "http://203.129.203.254/sms/user/urlsms.php?";
  $username   = "username=mobisirtechnologies";
  $password   = "pass=mobisirtechnologies321";
  $sender_id  = "senderid=060000";
  $message    = "message=".urlencode($content);
  $send_to    = "dest_mobileno=91".$user_phone;
  $response   = "response=Y";
  // SMS DATA LINK
  $sms_data   = $username."&".$password."&".$sender_id."&".$message."&".$send_to."&".$response;
  $response   = SEND_SMS_CURL($SMS_URL,$sms_data);
  return $response;
}

// SEND_SMS_CURL
function SEND_SMS_CURL($url,$message){
  $URL  = $url.$message;
  $curl = curl_init($URL);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  $retval = curl_exec($curl);
  curl_close($curl);
  echo "\n--- SMS SENDING RESPONSE ------------\n";
  echo $retval;
  echo "\n-------------------------------------\n";
  return $retval;
}


// CHECK SMS STATUS FUNCTION :
function CHECK_SMS_STATUS($schedule_id){
  $check_url  = "http://203.129.203.254/sms/user/responce.php?Scheduleid=";
  $SMS_CK_url = $check_url.$schedule_id;
  $sms_status = CHECK_SMS_CURL($SMS_CK_url);
  // check on condition do action 
  return $sms_status;
}

// CHECK SMS CURL 
function CHECK_SMS_CURL($URL)
{
  $curl = curl_init($URL);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  $report = curl_exec($curl);
  curl_close($curl);
  echo "\n--- SMS STATUS ------------\n";
  echo $report;
  echo "\n---------------------------\n";
  return $report;
}

// OPEN MySQL CONNECTION 
function open_mysql_connection($hostname,$username,$password){
  $dbhandle = mysql_connect($hostname,$username,$password) or die("unable to connect to Mysql");
  if(isset($dbhandle)){
    echo "<P> MySQL Connection Established </p>\n";
  }
  return $dbhandle;
}
// SELECT DB in MySQL
function use_data_base($dbhandle,$db_name){
  $selected=mysql_select_db($db_name,$dbhandle) or die("could not select skoldb");
  if(isset($selected)){
    return true;
  }
  return null;
}
// CLOSE MySQL CONNECTION 
function close_mysql_connection($dbhandle){
  mysql_close($dbhandle);
  echo "<p> MySQL connection Closed </p>\n";
}

?>
