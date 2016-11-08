
Create a config.php containing::

   <?php
   $username = "myusername";
   $password = "mypassword";
   $hostname = "localhost";
   $database = "mydatabase";
   ?>

To set up the database tables and users::

   php -f setup.php
