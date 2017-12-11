<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Add New Team</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Deleting Team...</h1>
      <?php
         # Disables PHP warnings
         error_reporting(E_ALL ^ E_WARNING);
         
         # Sets team id variable and creates queries
         $teamid = $_POST["deleteteamid"];
         $query1 = "SELECT count(*) FROM team;";
         $query2 = "DELETE FROM team WHERE teamid='".$teamid."';";
         
         # Finds number of rows in table before SQL query
         $numbefore = pg_fetch_result(pg_query($query1),0,0);
         
         # Performs SQL query
         if (!pg_query($query2)) {
               die("ERROR COULD NOT DELETE TEAM: " . pg_last_error($connection));
          }
         
         # Finds number of rows in table after SQL query
         $numafter = pg_fetch_result(pg_query($query1),0,0);
         
         # If number of rows has not changed, then a warning is thrown
         if ($numbefore==$numafter){
           echo("WARNING: THAT TEAM ID DOES NOT EXIST");
         }
         else{
           echo ("Team Deleted!");
         }
         
         # Disconnects from database
         pg_close($connection);
         ?>
</html>
</head>
