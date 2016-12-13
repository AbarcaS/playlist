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
	$origin = $_POST['origin'];
	$gender = $_POST['gender'];

	if($_POST['id'] != ''){
		echo "i have an id";
		$sql = "update `artist` set `name` = :name, `origin` = :origin, `gender` = :gender WHERE `id`=:id";
		echo $sql . "<br>";
		$stm = $dbh->prepare($sql);
		$arr = ['name' => $name,
				'origin' => $origin,
				'gender' => $gender,
				'id' => $_POST['id']
		];
		var_dump($arr);
$status = $stm->execute($arr);


	}else{
		echo "i dont have an id";
		$sql = "INSERT INTO `playlist_site`.`artist` (`name`, `origin`, `gender`) VALUES (:name, :origin, :gender)";
		echo $sql . "<br>";
		$stm = $dbh->prepare($sql);
		$arr = ['name' => $name,
		'origin' => $origin,
		'gender' => $gender];
		$status = $stm->execute($arr); //Returns TRUE on success or FALSE on failure.


		if($status == false){

			echo "Artist : {$name}s Already exists";
		}

		}
	}
	//INSERT INTO `playlist_site`.`artist` (`name`, `origin`) VALUES ('test', 'origin');
} 
        //if(exper) ? true ? false


?>

<form action="form_test.php" method="POST" accept-charset="utf-8">
	
	name<input type="text" name="name" value="" placeholder=""><br>
	origin<input type="text" name="origin" value="" placeholder=""><br>
	gender<input type="text" name="gender" value="" placeholder=""><br>
	<input type="hidden" name="id" value="<?php echo $id; ?>" placeholder="">
	<input type="submit" name="action" value="create">
</form>


<?php
//display
 $stm = $dbh->query(" select * FROM `artist`");
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