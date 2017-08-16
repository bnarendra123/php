<?php


if($_POST && isset($_FILES['file']))
{

    $from_email         = 'bnarendra6036@gmail.com'; //from mail, it is mandatory with some hosts
    $recipient_email    = 'bnarendra6036@gmail.com'; //recipient email (most cases it is your personal email)
     $message = filter_var($_POST[""], FILTER_SANITIZE_STRING); //message
     $reply_to_email = filter_var($_POST["email"], FILTER_SANITIZE_STRING); //sender email used in "reply-to" header
     $address= filter_var($_POST["address"], FILTER_SANITIZE_STRING); //sender name
     $sender_name    = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //sender name
     $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
     $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
     $address1 = filter_var($_POST["address1"], FILTER_SANITIZE_STRING);
     $address2= filter_var($_POST["address2"], FILTER_SANITIZE_STRING);
     $city= filter_var($_POST["city"], FILTER_SANITIZE_STRING);
     $state= filter_var($_POST["state"], FILTER_SANITIZE_STRING);
     $zip= filter_var($_POST["zip"], FILTER_SANITIZE_STRING);
     $country= filter_var($_POST["country"], FILTER_SANITIZE_STRING);
     $exp= filter_var($_POST["exp"], FILTER_SANITIZE_STRING);
     $job= filter_var($_POST["job"], FILTER_SANITIZE_STRING);
     $qualification= filter_var($_POST["qualification"], FILTER_SANITIZE_STRING);
     //$reply_to_sname = filter_var($_POST["sname"], FILTER_SANITIZE_STRING);
    //$reply_to_number = filter_var($_POST["number"], FILTER_SANITIZE_STRING);
    //$city= filter_var($_POST["city"], FILTER_SANITIZE_STRING);
 

    $subject = " Apply By $sender_name

";
   
 $subject1 = " Name : $sender_name

Email : $email

Mobile Number : $phone

Address : $address1

Address1 : $address2

City : $city

State : $state

Country : $country

Zicode : $zip

Total Experience : $exp

Job Category :$job

Qualification : $qualification

";
 

    /* //don't forget to validate empty fields 
    if(strlen($sender_name)<1){
        die('Name is too short or empty!');
    } 
    */
    
    //Get uploaded file data
    $file_tmp_name    = $_FILES['file']['tmp_name'];
    $file_name        = $_FILES['file']['name'];
    $file_size        = $_FILES['file']['size'];
    $file_type        = $_FILES['file']['type'];
    $file_error       = $_FILES['file']['error'];

    if($file_error > 0)
    {
        die('Upload error or No files uploaded');
    }
    //read from the uploaded file & base64_encode content for the mail
    $handle = fopen($file_tmp_name, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $encoded_content = chunk_split(base64_encode($content));

        $boundary = md5("sanwebe");
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From:".$from_email."\r\n"; 
        $headers .= "Reply-To: ".$reply_to_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //plain text 
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($sender_email.$subject.$subject1));  

        $body .= chunk_split(base64_encode($message));
        
        //attachment
        $body .= "--$boundary\r\n";
        $body .="Content-Type: $file_type; name=".$file_name."\r\n";
        $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
        $body .="Content-Transfer-Encoding: base64\r\n";
        $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
        $body .= $encoded_content; 
    
    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {       
echo '<meta http-equiv="refresh" content="0; URL=carrers.php?ins=success">';
//echo "success";
    }else{
        die('Could not send mail! Please check your PHP mail configuration.');  
    }
}

?>