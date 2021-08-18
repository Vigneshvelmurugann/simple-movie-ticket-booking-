<?php 

$db = mysqli_connect("localhost","root","","multi_login");  
if (!$db)  
  {  
  die('Could not connect: ' . mysql_error());  
  } 
if(isset($_POST['submit']))

{
$id=$_POST['id'];
$mvename=$_POST['m'];
$timing=$_POST['t'];
$screenname=$_POST['s'];

$result = mysqli_query($db,"INSERT into bookingdetails values('$id','$mvename','$timing','$screenname')");

if($result)

{

echo "Booking Confirmed Check Your Mail";
// the message


// Using the ini_set()
ini_set("SMTP", "smtp.gmail.com");
ini_set("sendmail_from", "vigneshvelmurugann@gmail.com");
ini_set("auth_password","vickyaswilliambrandbrandcr7");
ini_set("sendmail_path", "C:\xampp\sendmail\sendmail.exe -t");
ini_set("smtp_port", "465");

// The message


// Send
$headers = "From: ticketbooking@gmail.com";


$subject="Booking Confirmation.........Thanks for Booking";
$msg = "Your Ticket For .$mvename has been booked in .$screenname show time at .$timing";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,200);
$to_email=mysqli_query($db,"SELECT email FROM users WHERE id=$id");
// send email
$row = mysqli_fetch_array($to_email);
$a=boolval(mail($row[0],$subject, $msg,$headers));
echo($a);
if (mail($row[0],$subject, $msg,$headers)) {
    echo "Email successfully sent to ...";
} else {
    echo "Email sending failed...";
}

}

else{

echo "Something wrong";

}

}

?>