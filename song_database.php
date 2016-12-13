<?php 
if(!defined('mypage'))
{

 die("you are not allowed here");
}
 ?>



	<table class="tg" border="1">


		<tr>
			<th class="tg-031e">name</th>
			<th class="tg-yw4l">artist</th>
			<th class="tg-yw4l">album</th>
			<th class="tg-yw4l">year</th>
			<th class="tg-yw4l">link</th>
		</tr>
<?php
 $dbc = new PDO('mysql:host=localhost;dbname=playlist_site', "root", "");

 $query = $dbc->query("select * from top_25");
$arr = [];
while($results = $query->fetch()){


echo "
 			  <tr>
			    <th class=\"tg-031e\">$results[name]</th>
			    <th class=\"tg-yw4l\">$results[artist]</th>
			    <th class=\"tg-yw4l\">$results[album]</th>
			    <th class=\"tg-yw4l\">$results[year]</th>
			    <th class=\"tg-yw4l\">

<iframe width=\"320\" height=\"185\" src=\"https://www.youtube.com/embed/$results[link]\" frameborder=\"0\" allowfullscreen></iframe>

			     </th>	
			  </tr>
			  ";

}


?>




			</table>