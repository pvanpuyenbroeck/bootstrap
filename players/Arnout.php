<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="../opmaak.css" rel="stylesheet">
<title>The White Russians</title>
</head>


<body>
<div class="grid">
<img src="../afb/thewhiterussiansbanner.png" alt="white russians banner">




<div class="linkerbalk">
<ul id="linkerbalk">
<li><a href="../index.php.html">Home</a></li>
<li><a href="../players/players.html">Players</a></li>
<li><a href="../contact.html">Contact</a></li>
<li><a href="../geschiedenis.html">Geschiedenis</a></li>
<li><a href="https://www.facebook.com/groups/274796069293653/" target="_blank">Facebook</a></li>
<li><a href="http://www.kerngentdepinte.be/reeks4D.php" target="_blank">Klassement</a></li>
<li><a href="../formulier.php">Formulier</a></li>
</ul>
</div>
<div class="grid_3">
<img src="../afb/spelers/Arnout.jpg" height="100" width="100" alt="profielfoto" id="profielfoto">
<div class="spelerinfo">
  <?php
$voornaam = "Arnout";
$familienaam = "Vincent";

$db = new PDO('mysql:host=localhost;dbname=TWR','root', 'root');
$sql = "SELECT voornaam, familienaam, specialiteit, geboortedatum, BelgischeClub, EuropeseClub FROM TWRLeden
    WHERE voornaam = '$voornaam' AND familienaam = '$familienaam'";

$results = $db->query($sql);
  foreach($results as $row)
  {
    print ('<h1>' . $row['voornaam']. ' ' . $row['familienaam']. '</h1>');
    print('<p>' . 'specialiteit: ' . $row['specialiteit'] . '</p>');
    print('<p>' . 'geboortedatum: ' . $row['geboortedatum']. '</p>');
    print('<p>' . 'favoriete Belgische club: ' . $row['BelgischeClub']. '</p>');
    print('<p>' . 'favoriete Europese club: ' . $row['EuropeseClub']. '</p>');
  }
?>

	</div>
</div>
</div>

</body>
</html>
