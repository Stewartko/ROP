<?php

#Receive user input
$email = $_POST['email'];
$reason = $_POST['reason'];
$num = $_POST["num"];

#Send email
$headers = "From: $email";
$sent = mail('adamko5554@gmail.com', "Číslo objednávky" . $num, $reason, $headers);

#Thank user or notify them of a problem
if ($sent) {

?><html>
<head>
<title>Thank You</title>
</head>
<body>
<h1>Thank You</h1>
<p>Thank you for your feedback.</p>
</body>
</html>
<?php

} else {

?><html>
<head>
<title>Something went wrong</title>
</head>
<body>
<h1>Something went wrong</h1>
<p>We could not send your feedback. Please try again.</p>
</body>
</html>
<?php
}
?>