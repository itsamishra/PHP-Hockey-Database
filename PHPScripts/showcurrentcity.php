<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>City</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Getting City Name...</h1>
      <?php
         # Disables PHP warnings
         error_reporting(E_ALL ^ E_WARNING);
         
         # Gets city name associated with game id
         $gameid = $_POST["gameidtocity"];
         $query = "SELECT gamecity FROM game WHERE gameid='".$gameid."';";
         $output = (string)pg_fetch_result(pg_query($query),0,0);
         
         echo ' <p><u>Instructions:</u> Please enter the new city name, then press the "Change Name" button.</p>';
         
         # Throws error if invalid game id is entered
         if (strlen($output)==0){
           die("ERROR: THAT GAME ID IS INVALID");
         }
         # Creates data entry box and button
         else{
           echo('<form action="changecity.php" method="post">');
           echo('The city you selected is <input type="radio" name="currentcity" value="'.$output.'" checked>'.$output.'<br>');
           echo('<p>');
           echo('<u>Name Of New City:</u> <input type="text" name="newcityname"><br><br>');
           echo('<input type="submit" value="Change Name">');
           echo('</p>');
           echo('</form>');
         }
         
         # Disconnects from database
         pg_close($connection);
         ?>
</html>
</head>
