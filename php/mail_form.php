<?php

$errors = [];
$errorMessage = '';
// firstName,lastName,phone,subject,email,message
if (!empty($_POST)) {
   
    $firstName =$_POST['firstName'];
    $lastName= $_POST['lastName'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //testing php
    // $firstName ='thao';
    // $lastName= 'dev';
    // $phone='1234567890';
    // $subject='Testing email';
    // $email = 'thao@uk.com';
    // $message = 'This is testing email';

    function validate_phone_number($phone)
    {
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
        } else {
        return true;
        }
    }

    if(empty($firstName)|| empty($lastName)){
        $errors[] = 'First name or last name is empty';
    }

    // if (empty($name)) {
    //     $errors[] = 'Name is empty';
    // }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($phone)){
        $errors[] = 'Phone is empty';
    } else if (validate_phone_number($phone)==false){
        $errors[] = 'Phone is invalid';
    }

    if (empty($subject)){
        $errors[] = 'Subject is empty';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'ttngocthao_87@yahoo.com,testing@mightycultured.co.uk';
        $emailSubject = 'New email from your contact form';
      //  $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];
        $headers = 'From: ' .$email;

        $bodyParagraphs = [
            "First name: {$firstName}",
            "Last name: {$lastName}", 
            "Phone: {$phone}",
            "Subject: {$subject}",
            "Email: {$email}", 
            "Message:", 
            $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
           // header('Location: thank-you.html');//create thank-you page.
            echo "Sent mail";
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
            echo "Failed to send mail";
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
        echo "<script>console.log('Debug Objects: " . $allErrors . "' );</script>";
    }
}

?>