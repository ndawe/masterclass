
Create a file ``config.php`` containing the following::

	<?php
	$username = "mysqluser";
	$password = "mysqlpw";
	$hostname = "localhost";
	$database = "mysqldb";
	$studentpw = "studentpassword";
	$adminpw = "adminpassword";
	?>

Set the values appropriately.

To set up the database tables and users::

   php -f setup.php

And download the required JavaScript libraries::

   curl -O https://cdn.plot.ly/plotly-latest.min.js
