<html>
<head><title>Results</title>
</head>
<body>
<?php
include_once 'GreetMaster2000.php';

print ("Hello, " . $_POST['name'] . "!");
print ("<br />");

$gm = new GreetMaster2000();
$gm->setGreeting($_POST['greeting']);

print ("<b>Your greeting is:  <i>" . $gm->getFormalGreeting() . "</i></b>");

?>
</body>
</html>