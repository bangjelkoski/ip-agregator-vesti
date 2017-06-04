<?php 
include('config.php');

// Uzimamo podatke sa AJAX request-a
$id = $_GET['id'];
$count = $_GET['count'];
$post = $_GET['post'];
$type = $_GET['type'];

// Gledamo da li je komentar ili vest
switch($post){
	case 1: $table = "`vesti`"; $id_type = "`IDVesti`"; break;
	case 2: $table = "`komentari`"; $id_type = "`IDKomentara`"; break;
}

// Gledamo da li je Like ili Hate
switch($type){
	case 1:  $column = "`BrojLajkova`"; break;
	case 2:  $column = "`BrojHejtova`"; break;
} 

// Unesi podatke u databazu
$sql = "UPDATE ". $table ." SET ". $column ." = '". $count ."' WHERE ". $id_type ." = '". $id ."'"; 
mysqli_query($conn, $sql);

return;

?>