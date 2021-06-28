<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>

<ul>
  <li><a href="overzicht-instituut.php">Overzicht instituut</a></li>
  <li><a href="overzicht-activiteit.php">Overzicht activiteit</a></li>
  <li><a href="overzicht-jongere.php">Overzicht jongeren</a></li>
  <li><a href="overzicht-medewerker.php">Overzicht medewerker</a></li>
</ul>

</body>
</html>

<?php
session_start();
    echo "Welkom " . $_SESSION['username'];

?>