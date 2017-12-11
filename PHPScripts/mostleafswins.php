<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Official Info</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Loading Official...</h1>
      <?php
         # Creates and runs query on database
         $query = "SELECT firstname, lastname FROM official WHERE officialid in (SELECT officialid  FROM officiates WHERE gameid IN (SELECT gameid FROM plays WHERE gameid IN (SELECT gameid FROM plays WHERE teamid='12') AND teamid!='12' AND score<3) GROUP BY officialid ORDER BY count(officialid) DESC LIMIT 1);";
         $result = pg_query($query);
         
         # Prints result of query
         echo pg_fetch_result($result,0,0)." ".pg_fetch_result($result,0,1)." has officiated the most Leafs wins.";
         
         # Disconnects from database
         pg_close($connection);
         ?>
   </body>
</html>
