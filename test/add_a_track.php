<h1>Song Editor </h1>
<?php


var_dump( $_POST);

	//dabase query
	$user = "root"; //standard user name 
	$pass = ""; //standard root pw (no password unsafe but ok for testing)
	$dbh = new PDO('mysql:host=localhost;dbname=playlist_site', $user, $pass);


	$id = isset($_GET['id']) ? $_GET['id'] : '';



if(isset($_POST['action']))
{

	//if someonesubmits
	if($_POST['action'] == 'create' ){

	$name = $_POST['name'];
	$artist = $_POST['artist'];
	$album = $_POST['album'];
	$genre = $_POST['genre'];
	$year = $_POST['year'];

	if($_POST['id'] != ''){
		echo "i have an id";
		$sql = "UPDATE `songs` set `name` = :name, `artist` = :artist, `album` = :album, `genre` = :genre, `year`= :year WHERE `id`=:id";
		echo $sql . "<br>";
		$stm = $dbh->prepare($sql);
		$arr = ['name' => $name,
				'artist' => $artist,
				'album' => $album,
				'genre' => $genre,
				'year'=> $year,
				'id' => $_POST['id']
		];
		var_dump($arr);
$status = $stm->execute($arr);
var_dump($stm->errorInfo());
	}else{
		echo "i dont have an id";
		$sql = "INSERT INTO `playlist_site`.`songs` (`name`, `artist`, `album`, `genre`, `year`) VALUES (:name, :artist, :album, :genre, :year)";
		echo $sql . "<br>";
		$stm = $dbh->prepare($sql);
		$arr = ['name' => $name,
				'artist' => $artist,
				'album' => $album,
				'genre' => $genre,
				'year' => $year];
		$status = $stm->execute($arr); //Returns TRUE on success or FALSE on failure.


		if($status == false){

			echo "Song : {$name} Already exists learn to type";
		}

		}
	}
	//INSERT INTO `playlist_site`.`artist` (`name`, `origin`) VALUES ('test', 'origin');
} 
        //if(exper) ? true ? false


?>

<form action="add_a_track.php" method="POST" accept-charset="utf-8">
	
	name<input type="text" name="name" value="" placeholder=""><br>
	artist<input type="text" name="artist" value="" placeholder=""><br>
	album<input type="text" name="album" value="" placeholder=""><br>
	genre<input type="text" name="genre" value="" placeholder=""><br>
	year<input type="text" name="year" value="" placeholder=""><br>
	<input type="text" name="id" value="<?php echo $id; ?>" placeholder="">
	<input type="submit" name="action" value="create">
</form>


<?php
//display
 $stm = $dbh->query(" select id, name, artist, album, genre, year FROM `songs`");
echo "<table border='1'>";
 while($row = $stm->fetch(PDO::FETCH_ASSOC)){

echo PHP_EOL."<tr>";

foreach ($row as $col) {
	echo "<td>$col</td>";

}
	echo "<td><a href=\"?id={$row['id']}\" title=\"\">Edit</a></td>";

echo "</tr>";

 }
 echo "</table>";
