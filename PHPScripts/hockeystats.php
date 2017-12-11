<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Hockey Stats</title>
   </head>
   <body>
      <?php
         # Connects to database
         include 'connectdb.php';
         ?>
      <h1>Hockey Stats</h1>
      <p>By: Ashutosh Mishra</p>
      <hr>
      <h2>View Teams</h2>
      <p><u>Instructions:</u> Please select how would like to view the team data.</p>
      <form action="getdata.php" method="post">
         <?php
            # Gives user 4 options with which they can view team table
            echo('<input type="radio" name="listby" value="teamname" checked>Sort Alphabetically By Team Name (Ascending)<br><br>');
            echo('<input type="radio" name="listby" value="teamname DESC">Sort Alphabetically By Team Name (Descending)<br><br>');
            echo('<input type="radio" name="listby" value="teamcity">Sort Alphabetically By Team City (Ascending)<br><br>');
            echo('<input type="radio" name="listby" value="teamcity DESC">Sort Alphabetically By Team City (Descending)<br><br>');
            echo(' <input type="submit" value="Get Teams">');
            ?>
      </form>
      <hr>
      <h2>Insert A New Team</h2>
      <p><u>Instructions:</u> Please enter what you would like the new team's ID, Name, and City to be. Afterwards, press the "Add New Team" button.</p>
      <form action="addnewteam.php" method="post">
         <?php
            # Allows user to insert a new team into table
            echo('<p>');
              echo('<u>New Team ID:</u> <input type="text" name="newteamid"><br><br>');
              echo('<u>New Team Name:</u> <input type="text" name="newteamname"><br><br>');
              echo('<u>New Team City:</u> <input type="text" name="newteamcity"><br>');
            echo('</p>');
            echo('<input type="submit" value="Add New Team">');
            ?>
      </form>
      <hr>
      <h2>Delete An Existing Team</h2>
      <p><u>Instructions:</u> Please enter the Team ID associated with the team you would like to delete..</p>
      <form action="deleteteam.php" method="post">
         <?php
            # Allows user to delete a team by entering its team id
            echo('<p>');
            echo('<u>Team ID Of Team To Be Deleted:</u> <input type="text" name="deleteteamid"><br><br>');
            echo('<input type="submit" value="Delete Team">');
            echo('</p>');
            ?>
      </form>
      <hr>
      <h2>Update Name Of City</h2>
      <p><u>Instructions:</u> Please enter the Game ID corresponding to the city whose name you want to change..</p>
      <form action="showcurrentcity.php" method="post">
         <?php
            # Shows user city associated with game id
            echo('<p>');
            echo('<u>Game ID Of City:</u> <input type="text" name="gameidtocity"><br><br>');
            echo('<input type="submit" value="Show City">');
            echo('</p>');
            ?>
      </form>
      <hr>
      <h2>View Game Info</h2>
      <p><u>Instructions:</u> Please enter the Game ID associated with the game you would like to know more about.</p>
      <form action="showgameinfo.php" method="post">
         <?php
            # Shows information relating to inputted game id
            echo('<p>');
            echo('<u>Game ID:</u> <input type="text" name="gameid"><br><br>');
            echo('<input type="submit" value="Show City">');
            echo('</p>');
            ?>
      </form>
      <hr>
      <h2>Officials</h2>
      <p><u>Instructions:</u> Click the button below to see a list of NHL officials in order by last name.</p>
      <form action="showofficials.php" method="post">
         <?php
            # Displays list of NHL officials
                echo('<input type="submit" value="Show Officials">');
              ?>
      </form>
      <hr>
      <h2>Maple Leafs Information</h2>
      <p><u>Instructions:</u> Please click one of the buttons below to learn more about the Maple Leafs.</p>
      <form action="leafsgamesinfo.php" method="post">
         <?php
            # Provides user with information about Toronto Maple Leafs and which officials officiate their games most
                echo('<input type="submit" value="Show Leafs Games">');
              ?>
      </form>
      <br>
      <form action="mostleafsgames.php" method="post">
         <?php
            echo('<input type="submit" value="Show Official Who Officiated Most Leafs Games">');
            ?>
      </form>
      <br>
      <form action="mostleafslosses.php" method="post">
         <?php
            echo('<input type="submit" value="Show Official Who Officiated Most Leafs Losses">');
            ?>
      </form>
      <br>
      <form action="mostleafswins.php" method="post">
         <?php
            echo('<input type="submit" value="Show Official Who Officiated Most Leafs Wins">');
            ?>
      </form>
      <br>
      <?php
         # Disconnects from database
           pg_close($connection);
         ?>
   </body>
</html>
