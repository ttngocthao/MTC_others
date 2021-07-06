<?PHP
$sender = 'thao@mail.com';
// $recipient = 'testing@mightycultured.co.uk';
 $recipient = 'ttngocthao_87@yahoo.com';

$subject = "php mail test";
$message = "php test message";
$headers = 'From:' . $sender;

if (mail($recipient, $subject, $message, $headers))
{
    echo "Message accepted";
}
else
{
    echo "Error: Message not accepted";
}
?>