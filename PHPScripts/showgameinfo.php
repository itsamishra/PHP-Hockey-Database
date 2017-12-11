<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Game Info</title>
</head>
<body>
<?php
# Connects to database
include 'connectdb.php';
?>
<h1>Loading Game Information...</h1>

<?php
  # Disables PHP warnings
  error_reporting(E_ALL ^ E_WARNING); 
  
  # Variables that will hold official's id's  
  $officials = "";
  $headofficial = "";
  
# Creates query
  $gameid = $_POST["gameid"];
  $query1 = "SELECT officiates.officialid as Official, official.officialid as headofficial FROM officiates, game, official WHERE game.gameid='".$gameid."' AND officiates.gameid=game.gameid AND game.headofficialid=official.officialid;";
 
  # Checks to see if game id is valid
  $result1 = pg_query($query1);  
  if (strlen((string)pg_fetch_result($result1,0,0))==0){
    die("ERROR: THAT GAME ID IS INVALID");
  }
 
  # Gets official's id's from database
  while ($row = pg_fetch_array($result1)) {
        $officials=$officials.$row["official"]." ";
        $headofficial = $row["headofficial"];
  }

  # Will hold  name of all officials
  $allofficials = "";  
  
  # Adds regular officials to allofficials
  $officials = explode(" ", $officials);
  foreach ($officials as $value){
    $query2 = "SELECT firstname, lastname FROM official WHERE officialid='".$value."';";
    $result2 = pg_query($query2);
    
    while ($row = pg_fetch_array($result2)) {
      $allofficials = $allofficials.$row["firstname"]." ".$row["lastname"].", ";
    }
  } 

  # Adds head offical to allofficials (highlights the name)
  $query3 = "SELECT firstname, lastname FROM official WHERE officialid='".$headofficial."';";
  $result3 = pg_query($query3);
  while ($row = pg_fetch_array($result3)) {
      $allofficials = $allofficials."<mark>".$row["firstname"]." ".$row["lastname"]."</mark>";
    }

  
  # Grabs all data required except for official's names
  $query4 = "SELECT DISTINCT teamname, teamcity, score, gamecity, gamedate FROM game,plays,team, officiates, official WHERE game.gameid='".$gameid."' and plays.gameid=game.gameid AND  plays.teamid=team.teamid AND officiates.gameid=game.gameid AND  officiates.officialid=official.officialid;";
  $result4 = pg_query($query4);

  # Creates table headings
  echo("<table style='width:100%'><tr>");
  echo("<th><u>Team Name</th></u><th><u>Team City</th></u><th><u>Team Score</th></u><th><u>Game City</th></u><th><u>Game Date</th></u><th><u>Game Officials</th></u>");
  echo("</tr>");

  # Checks to see which team won and highlights that team's name before adding it to table
  if (pg_fetch_result($result4,0,2)>pg_fetch_result($result4,1,2)){
    $highlight = True;
    while ($row = pg_fetch_array($result4)) {
      echo("<tr><th>");
      if ($highlight == True){
        echo "<mark>".$row["teamname"]."</mark>";
        $highlight = False;
      }
      else{
        echo $row["teamname"];
      }
      echo "</th><th>".$row["teamcity"]."</th><th>".$row["score"]."</mark>"."</th><th>".$row["gamecity"]."</th><th>".$row["gamedate"]."</th><th>".$allofficials;
    }
    echo("</th></tr>");
  }
  else{
    $highlight = False;
    while ($row = pg_fetch_array($result4)) {
      echo("<tr><th>");

      if ($highlight == True){
        echo "<mark>".$row["teamname"]."</mark>";
      }
      else{
        echo $row["teamname"];
        $highlight = True;
      }

      echo "</th><th>".$row["teamcity"]."</th><th>".$row["score"]."</th><th>".$row["gamecity"]."</th><th>".$row["gamedate"]."</th><th>".$allofficials;   
    }
    echo("</th></tr>");
  }
  echo("</table>");

#Disconnects from database
  pg_close($connection);
?>
</html>
</head>
