<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Leafs Games</title>
   </head>
   <body>
      <?php
         # Creates connection with database
         include 'connectdb.php';
         ?>
      <h1>Loading Leafs Games...</h1>
      <?php
         # Creates and runs query on database
           $query = "SELECT gameid, plays.teamid, team.teamname, teamcity, score FROM plays, team WHERE team.teamid=plays.teamid AND gameid IN (SELECT gameid FROM plays WHERE plays.teamid='12') ORDER BY gameid;";
           $result = pg_query($query);
         
         # Creates header of table
         echo("<table style='width:50%'><tr>");
         echo("<th><u>Game ID</u></th><th><u>Team ID</u></th><th><u>Team Name</u></th><th><u>Team City</u></th><th><u>Score</u></th>");
         echo("</tr>");
         
         # Fills in table with data from database
         while ($row = pg_fetch_array($result)) {
         echo("<tr><th>");
         echo $row["gameid"]."</th><th>".$row["teamid"]."</th><th>".$row["teamname"]."</th><th>".$row["teamcity"]."</th><th>".$row["score"];
         echo("</th></tr>");
         }
         
         # Closes connection with database
         pg_close($connection);
         ?>
   </body>
</html>
