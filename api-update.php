<?php

header('Content-Type: application/json');
header('Access-Control-Allow-origin:*'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Request-With');


$data = json_decode(file_get_contents("php://input"), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include "config.php";

$sql = "UPDATE  student_table SET students_name = '{$name}', age = '{$age}', city = '{$city}' WHERE id = {$id}";


if (mysqli_query($conn, $sql)) {
	
	echo json_encode( array('message' => 'Student  Record Updated','status' => true ));
	

}else{

	echo json_encode( array('message' => 'Student  Record Not Updated','status' => false ));
}

?>