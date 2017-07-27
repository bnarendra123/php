<?php
if(isset($_POST['submit'])){
include "config.php";    
 $name = $_POST['name'];
 $fathername = $_POST["fathername"];
 $email = $_POST["email"];

 $number = $_POST["number"];
 $property = $_POST["property"];
 $hno = $_POST["hno"];
 $address = $_POST["address"];
 $street = $_POST["street"];
 $country = $_POST["country"];
 $city = $_POST["city"];
$mandal = $_POST["mandal"];
 $district = $_POST["district"];
 $state = $_POST["state"];
 $pincode = $_POST["pincode"];	


 $sql = "INSERT INTO `single1` (`id`, `name`, `fathername`, `email`, `number`, `property`, `hno`, `address`, `street`, `country`, `city`, `mandal`, `district`, `state`, `pincode`) 
 VALUES (NULL, '$name', '$fathername', '$email','$number', '$property', '$hno', '$address', '$street', '$country', '$city', '$mandal', '$district', '$state', '$pincode');"; 

$result = mysql_query($sql);

   if (!$result) {
    printf("Error: %s\n", mysql_error($conn));
    exit();
}					
if(!$result){
	
	echo "not inserted";
}else{
	//echo "inserted";
	//echo '<meta http-equiv="refresh" content="0; URL=insert.php?ins=success">';
	echo "<h1 style='color:blue; text-align:center;'>Thanks For Registering With Us.Please Check Your Email.</h1>"."<br />";
	
	echo "<h3 style='color:blue; text-align:center;'>Our Team Will Get Back To You.</h3>"."<br />";
    
	echo "<p style='text-align:center;'><a href='index.php'>Click Here</a> To Go Home. ";
}
if($sql){
    $recipient = "info@landsman.in";
 
    $subject = "contact by $name";
 
    $email_content = " contact from $name

Name : $name
Fathername: $fathername
Email: $email
Number: $number
Property: $property
House no/Plat no: $hno
Address: $address
Street: $street
Country: $country
City: $city
Mandal: $mandal
District: $district
State: $state
Pincode : $pincode";
 
    // Mail headers
    $email_headers = "From:info@landsman.in";
 
    // Main messages
    if (mail($recipient, $subject, $email_content, $email_headers))
        {
      $recipient1 = "$email";
$subject = "Landsman Register";
    $htmlContent  = "
    <html>
    <head></head>
    <body>
    <img src='http://landsman.in/register/12.jpg' style='margin-left:-100px;'/>
    <div class='container'  style='width: 70%; height:400px;'>
    	
        <p style='padding:50px; width:100%; height:520px;text-align: justify; background-color:#005ba3; color:#fff;'>
        <strong>Hi $name </strong><br><br>

		Welcome to LANDSMAN<br><br>
		Thanks for joining with us. You are on your way to super-productivity and beyond!<br><br>

		LANDSMAN is a task management that helps you focus on the important things in life  Set and track daily, weekly, and monthly priorities and get the stuff that matters done.<br><br>

		Our number one tip to get the most out of LANDSMAN is to download our browser extension and give it a whirl. [how it helps] It'll make sticking to your priorities super simple and just a click away.<br><br>

		[open communication channel for questions, conversations, and help]
		Have any questions? Just shoot us an email! We are always here to help.<br><br>

		Cheerfully yours,<BR>
		The LANDSMAN Team

		<br><br><br>

      	<button class='btn btn-primary btn-lg'><a href='http://landsman.in/' target='_blank' role='button'>Get Started</a></button></p>
      </div></body></html>";
 
    // Mail headers
   $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: <info@landsman.in>' . "\r\n";


    if(mail($recipient1,$subject,$htmlContent,$headers)):
       $successMsg = 'Email has sent successfully.';
     else:
    $errorMsg = 'Email sending fail.';
endif;
        }
}
     
}


?>