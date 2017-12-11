<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>New City</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Changing City Name...</h1>
      <?php
         # Gets $_POST variables from previous .php page
           $currentcityname = $_POST["currentcity"];
           $newcityname = $_POST["newcityname"];
         
          # Creates and runs query on database
           $query = "UPDATE game SET gamecity='".$newcityname."' WHERE gamecity='".$currentcityname."';";
           pg_query($query);
           echo("City Name Changed!");
         
         # Disconnects from database
           pg_close($connection);
         ?>
</body>
</html>
