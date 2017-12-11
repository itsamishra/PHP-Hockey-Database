<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Team Data</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Team Data</h1>
      <?php
         # Gets $_POST variable from previous .php file
           $listby= $_POST["listby"];
         
         # Creates and runs query on database
           $query='SELECT * FROM team ORDER BY '.$listby.';';
           $result = pg_query($query);
         
         # If query fails, an exception is thrown  
         if (!$result) {
              die ("Database query failed!");
           }
         
         # Creates table heading
           echo("<table style='width:25%'><tr>");
           echo("<th><u>Team ID</u></th><th><u>Team Name</u></th><th><u>Team City</u></th>");
           echo("</tr>");
         
         # Fills in table with data from database
           while ($row = pg_fetch_array($result)) {
              echo("<tr><th>");
              echo $row["teamid"]."</th><th>".$row["teamname"]."</th><th>".$row["teamcity"];
              echo("</th></tr>");
           }
           echo("</table>");
         
           pg_free_result($result);
         ?>
      <?php
         # Closes connection with database
            pg_close($connection);
         ?>
   </body>
</html>
