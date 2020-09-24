<?php

header('Content-Type: application/json');
header('Access-Control-Allow-origin:*');

$data = json_decode(file_get_contents("php://input"), true);

$search_Value = $data['search'];

include "config.php";

$sql = "SELECT * FROM student_table WHERE Students_name LIKE '%{$search_Value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if (mysqli_num_rows($result) > 0) {
	
	$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	echo json_encode($output);

}else{

	echo json_encode( array('message' => 'NO search Found','status' => false ));
}

?>