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
      <h1>Adding New Team...</h1>
      <?php
         # Disables PHP warnings
         error_reporting(E_ALL ^ E_WARNING);
         
         # Gets $_POST variables from previous .php file
         $newteamid = $_POST["newteamid"];
         $newteamname = $_POST["newteamname"];
         $newteamcity = $_POST["newteamcity"];
         
         # Inserts new team into database
         $query = "INSERT INTO team VALUES ('".$newteamid."','".$newteamcity."','".$newteamname."');";
         
         # If new team could not be inserted, throws an error 
         if (!pg_query($query)) {
               die("ERROR: COULD NOT INSERT TEAM BECAUSE THAT ID IS IN USE");
           }
         
         echo ("Team Added!");
         
         # Closes connection with database
         pg_close($connection);
         ?>
   </body>
</html>
