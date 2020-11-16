<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@supercranium.com";
    $email_subject = "New form submissions from Super Cranium landing page";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email'])
    ) 
    {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:700&display=swap" rel="stylesheet">
    
    <title>Super Cranium</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174984573-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-174984573-1');
    </script>

    <!-- Hotjar Tracking Code for www.supercranium.com -->
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1937123,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    
    <meta name="description" content="Super Cranium - Gamewear is the new streetwear."/>
    <link rel="canonical" href="http://supercranium.com" />
    <meta name="robots" content= "index, follow">
    
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Super Cranium" />
    <meta property="og:description" content="Super Cranium - Gamewear is the new streetwear." />
    <meta property="og:image" content="http://supercranium.com/images/Super-Cranium-og.png" />
    <meta property="og:url" content="http://supercranium.com" />
    <meta property="og:site_name" content="Super Cranium" />

    <meta name="twitter:title" content="Super Cranium">
    <meta name="twitter:description" content="Super Cranium - Gamewear is the new streetwear.">
    <meta name="twitter:image" content="http://supercranium.com/images/Super-Cranium-og.png">
    <meta name="twitter:site" content="@thesupercranium">
    <meta name="twitter:creator" content="@thesupercranium">

</head>

    <title>Super Cranium</title>
</head>
<body>
    <div class="center"><img src="/images/Super-Cranium-logo.png" alt="logo"></div>
    <h2 class="center space30">Thank you for contacting us. We will be in touch.</h2>


    <div class="space30"></div>
    <h3 class="center">Keep in touch with us. We <i class="fas fa-heart"></i> new friends.</h3>
    <p class="center padding10 font40">
        <a href="https://www.facebook.com/supercranium/"><i class="fab fa-facebook padding10 social"></i></a>
        <a href="https://www.instagram.com/super.cranium/"><i class="fab fa-instagram padding10 social"></i></a>
        <a href="https://twitter.com/thesupercranium"><i class="fab fa-twitter padding10 social"></i></a>
        <a href="mailto:info@supercranium.com"><i class="far fa-envelope padding10 social"></i></a>
    </p>
</body>
</html>

<?php
}
?>