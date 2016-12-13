<?php

define('mypage',true);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
  <div id="page">
	<div id="top">top</div>
	<div id="menu">
		<ul>
			<li><a href="">songs</a></li>
		
		</ul>
 

	</div>
	<div id="container" >

		</div>
		<div id="data">
			<h2>TOP 25 SONGS OF THIS WEEK
			</h2>
			<?php 
       		include 'song_database.php';

     //import stats
			 ?>

		</div>
    <div style="clear: both;"></div>
	</div> <!-- container -->
	<div id="footer">To have a great view go to
	<p>
U.S. Bank Tower, 633 W 5th St, Los Angeles, CA 90071</p>
	</div>
	</div>
</body>
</html>