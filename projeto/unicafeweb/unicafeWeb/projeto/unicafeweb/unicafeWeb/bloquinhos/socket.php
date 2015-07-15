<?php


//conection:
$link = mysqli_connect("localhost","root","cocacola@12","nexcafe") or die("Error " . mysqli_error($link));

//consultation:

$query = "SELECT * FROM aluno" or die("Error in the consult.." . mysqli_error($link));

//execute the query.

$result = $link->query($query);

//display information:

while($row = mysqli_fetch_array($result)) {
	echo $row["nome"] . "<br>";
}

?>