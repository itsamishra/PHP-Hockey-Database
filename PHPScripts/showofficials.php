<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>View Officials</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Loading Officials...</h1>
      <?php
         # Creates and runs query on database
         $query = "SELECT * FROM official ORDER BY lastname;";
         $result = pg_query($query);
         
         # Creates table header
         echo("<table style='width:50%'><tr>");
         echo("<th><u>Official ID</u></th><th><u>First Name</u></th><th><u>Last Name</u></th><th><u>Home City</u></th>");
         echo("</tr>");
         
         # Fills out table with information from database
         while ($row = pg_fetch_array($result)) {
         echo("<tr><th>");
         echo $row["officialid"]."</th><th>".$row["firstname"]."</th><th>".$row["lastname"]."</th><th>".$row["homecity"];
         echo("</th></tr>");
         }
         
         echo("</table>");
         
         # Disconnects from database
         pg_close($connection);
         ?>
</body>
</html>
