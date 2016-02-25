<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- made by www.metatags.org -->
    <meta name="description" content="minivoetbalclub the white russians" />
    <meta name="keywords" content="minivoetbalploeg, the white russians, Pieter Van Puyenbroeck, Jonas Verstuyft, kern gent de pinte, kern gentdepinte, Jonas De Jans, casa di pussy, 69" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 month">
    <title>The white russians</title>
    <!-- the white russians, Pieter Van Puyenbroeck, minivoetbal -->

    <link rel="icon" type="image/png" href="afb/football.png">
    <link rel="stylesheet" href="css/reset.css"/>
    <link href="css/opmaak.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/stats.js"></script>
</head>
<body>
    <!-- HEADER NAVIGATION -->
    <?php include_once("analyticstracking.php");
    include 'header.php';?>


    <main>

        <div id="container">
            <div class="col80">
                <!--        db voor connectie naar one.com database-->
                <!--$db = new PDO('mysql:host=thewhiterussians.be.mysql;dbname=thewhiterussians_be_twr','thewhiterussians_be_twr','N1nj@dood');-->
                <?php
                /*db CONNECTIE*/
               $db = new PDO('mysql:host=thewhiterussians.be.mysql;dbname=thewhiterussians_be_twr','thewhiterussians_be_twr','N1nj@dood');

                /*SELECTEER WEDSTRIJDEN*/ 
                $selectwedstrijd = "SELECT tegenstanders.tegenstanderId, tegenstanders.tegenstander FROM `tegenstanders`\n"
                . "ORDER BY tegenstander ASC";
                $wedstrijden = $db->query($selectwedstrijd);
                ?>

                <!-- FORM OM SCORES IN TE GEVEN -->
                <div class="form">
                    <form action= <?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
                        <!-- SELECTEER TEGENSTANDER -->
                        <h3>Selecteer tegenstander</h3>

                        <select id="wedstrijd" name="tegenstander" onchange="datumbepalen(this.value)">
                            <option value=""></option>
                            <?php
                            foreach ($wedstrijden as $row) {
                                /*echo '<option value=' . $row['tegenstanderId'];*/
                                //if (!empty($_POST['tegenstander']) && $_POST['tegenstander'] == $row['tegenstanderid']){
                                if (isset($_POST['tegenstander']) && $_POST['tegenstander'] == $row['tegenstanderId']){
                                     echo '<option value=' . $row['tegenstanderId']." selected=selected>" . $row['tegenstander'] . "</option>";
                                
                            
                                } else {
                                    echo '<option value=' . $row['tegenstanderId'] . ">" . $row['tegenstander'] . "</option>";
                                }

                            }

                                ?>
                            </select>
                            <!-- SELECTEER DATUM -->
                            <div id="datum" >
                                <h3>Selecteer datum</h3>
                                <select type="text" name="datum">
                                </select>
                                <!-- SELECTEER SPELER -->
                                <h3>Selecteer speler</h3>
                                <select type="text" name="speler">
                                </select>
                            </div>
                            <script type="text/javascript">
                            keepselected(<?php echo $_POST['tegenstander'] . ",'" . ($_POST['datum'])."'"; ?>);
                            </script>
                            <!-- INPUTVELD VOOR DOELPUNTEN IN TE GEVEN -->
                            <h3>Aantal doelpunten</h3>
                            <input type="text" name="aantaldoelpunten"><br />
                            <input type="submit" value="Submit">
                            
                        </form>
                    </div>
                    <?php
                    /*CONTROLE OF POST GEDAAN IS EN DAN INSERT IN DATABASE*/
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $datum = $_POST['datum'];
                        $tegenstanderid= $_POST['tegenstander'];
                        $spelerid= $_POST['speler'];
                        $aantaldoelpunten= $_POST['aantaldoelpunten'];

                        $selectwedstrijdid= "SELECT wedstrijdId FROM wedstrijden\n"
                        . "WHERE IdTegenstander='".$tegenstanderid."'" . "AND datum='".$datum."'";
                        $wedstrijdid=$db->query($selectwedstrijdid);
                        foreach ($wedstrijdid as $row){
                            $id= $row['wedstrijdId'];
                        } 
                        $insertscore="INSERT INTO `stats` "
                        . "( `IdSpeler`, `IdWedstrijd`, `aantalGoals`) VALUES (".$spelerid.",".$id. ",".$aantaldoelpunten.");";
                        $db->exec($insertscore);
                    }
                    ?>
                </div>
            </div>

        </main>
        <a href="#top" id="topimage"><img src="afb/top.png" alt="top image"></a>
    </body>
    </html>
