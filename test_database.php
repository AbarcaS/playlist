<?php 



//ok sample connection to db
//127.0.0.1              =    localhost
// ^^ ip                 ^^   hostname 
// example 216.58.219.46  =   google.com
$user = "root"; //standard user name 
$pass = ""; //standard root pw (no password unsafe but ok for testing)
 $dbh = new PDO('mysql:host=localhost;dbname=playlist_site', $user, $pass);
// use the connection here
$sth = $dbh->query('SELECT * FROM top_25');
echo "<table>"; 
//ty!!! there you go
foreach ($sth as $row) {
	//last example
	echo "<tr>"; //start row
	echo "<td>$row[song_id]</td>";
	echo "<td>$row[name]</td>";
	echo "<td>$row[artist]</td>";
	echo "<td>$row[album]</td>";
	echo "<td>$row[year]</td>";
	echo "<td>$row[link]</td>";
	echo "</tr>"; //end row
}
echo "</table>"; 
// and now we're done; close it
$sth = null;
$dbh = null;
?>







