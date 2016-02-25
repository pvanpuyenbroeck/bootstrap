<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!-- made by www.metatags.org -->
<meta name="description" content="Minivoetbalclub The White Russians" />
<meta name="keywords" content="minivoetbalploeg, the white russians, Pieter Van Puyenbroeck, Jonas Verstuyft, kern gent de pinte, kern gentdepinte, Jonas De Jans, casa di pussy, 69" />
<meta name="author" content="metatags generator">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 month">
<title>The white russians</title>
<!-- the white russians, Pieter Van Puyenbroeck, minivoetbal -->

<link rel="icon" type="image/png" href="afb/football.png">
<link href="css/opmaak.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

</head>


<body>
    <?php include_once("analyticstracking.php");
    include 'header.php';?>

<main>
<div id="container" class="container-fluid">
<h1>The White Russians</h1>
<p>Talentvolle ploeg in 4e regionaal kern Gent De Pinte.</p>
<h2>Wedstrijden en doelpuntenmakers</h2>
<div class="row">
    <div class="col-md-4 col-xs-8">
<!--        db voor connectie naar one.com database-->
<!--            $db = new PDO('mysql:host=thewhiterussians.be.mysql;dbname=thewhiterussians_be_twr','thewhiterussians_be_twr','N1nj@dood');-->
    <?php 
    $db = new PDO('mysql:host=thewhiterussians.be.mysql;dbname=thewhiterussians_be_twr','thewhiterussians_be_twr','N1nj@dood');
     $sql =  "SELECT spelers.voornaam, spelers.familienaam, sum(stats.aantalGoals)\n"
    . "FROM stats\n"
    . "INNER JOIN spelers\n"
    . "ON stats.IdSpeler=spelers.spelerId\n"
    . "GROUP BY Idspeler\n"
    . "ORDER BY sum(stats.aantalGoals) DESC";
     
     $sqlwedstrijden="SELECT datum, tegenstander, twrscore, TegenstanderScore\n"
    . "FROM wedstrijden\n"
    . "ORDER BY datum"; 
     
    $resultwedstrijden=$db->query($sqlwedstrijden);
    $result = $db->query($sql);
    
    echo '<table class="table table-striped table-bordered table-responsive">
    <tr>
    <th>Datum</th>
    <th>Tegenstander</th>
    <th>TWR</th>
    <th>Tegenstander</th>';
    foreach($resultwedstrijden as $row){
        $date= date("d-m-Y",strtotime($row['datum']));
    print ('<tr><td>' . $date . '</td>
            <td>' . $row['tegenstander'] .'</td>
            <td>' . $row['twrscore'] .'</td>
            <td>' . $row['TegenstanderScore'] .'</td></tr>');
    }
    echo '</table>';
    echo '</div>
    <div class="col-md-4"></div>
    <div class="col-md-4" col-xs-4>';
    
    echo '<table id="topgoals" class="table table-striped table-bordered table-responsive" >
    <tr>
    <th>Naam</th>
    <th>Goals</th>';
    foreach($result as $row){
    print ('<tr><td>' . $row['voornaam']. " " . $row['familienaam']. '</td>'
            . '<td>' . $row['sum(stats.aantalGoals)'] .'</td></tr>');
    }
    echo '</table>';
    ?>
    </div>
</div>
<h2>Stage in Cadzand</h2>
<div class="col33">
<img src="afb/stage1.jpg" width="500"  alt="oefenstage foto voetballen"></div><!-- \ 
--><div class="col33"><img src="afb/stage2.jpg" width="500"  alt="oefenstage foto voetballen"><!-- \ 
    --></div><div class="col33"><img src="afb/stage3.jpg" width="500"  alt="poseren bij auto"></div>
</div>
    </div>
    
</main>
<a href="#top" id="topimage"><img src="afb/top.png" alt="top image"></a>
</body>

</html>