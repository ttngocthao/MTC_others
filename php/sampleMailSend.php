<?php

$errors = [];
$errorMessage = '';
// firstName,lastName,phone,subject,email,message
if (!empty($_POST)) {
    // $name = $_POST['name'];
    $firstName =$_POST['firstName'];
    $lastName= $_POST['lastName'];
    $phone=$_POST['phone'];
    $subject=$_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

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
        $toEmail = 'ttngocthao_87@yahoo.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = [
            "First name: {$firsName}",
            "Last name: {$lastName}", 
            "Phone: {$phone}",
            "Subject: {$subject}",
            "Email: {$email}", 
            "Message:", 
            $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: thank-you.html');//create thank-you page.
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>

<!-- <html>
<body>
  <form action="/mail_form.php" method="post" id="contact-form">
    <h2>Contact us</h2>

    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
    <p>
      <label>First Name:</label>
      <input name="name" type="text" value="dima"/>
    </p>
    <p>
      <label>Email Address:</label>
      <input style="cursor: pointer;" name="email" value="dima@dima.com" type="text"/>
    </p>
    <p>
      <label>Message:</label>
      <textarea name="message">dima</textarea>
    </p>

    <p>
      <input type="submit" value="Send"/>
    </p>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: { allowEmpty: false }
          },
          email: {
              presence: { allowEmpty: false },
              email: true
          },
          message: {
              presence: { allowEmpty: false }
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
</body>
</html> -->