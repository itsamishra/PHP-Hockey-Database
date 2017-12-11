<?php
   # Variables are set to authenticate database access
   $dbhost = "HOSTNAMEHERE";
   $dbuser= "USERNAMEHERE";
   $dbpass = "PASSWORDHERE";
   $dbname = "DBNAMEHERE";
   
   # Connetion to dtabase is made
   $connection = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
   
   # If connection fails, error is thrown
   if (!$connection) {
        echo "ERROR: DATABASE CONNECTION FAILED" ;
      }
   ?>