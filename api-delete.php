<?php

header('Content-Type: application/json');
header('Access-Control-Allow-origin:*'); 
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Request-With');


$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['sid'];

include "config.php";

$sql = "DELETE FROM  student_table WHERE id = {$student_id}";


if (mysqli_query($conn, $sql)) {
	
	echo json_encode( array('message' => 'Student  Record DELETED','status' => true ));
	

}else{

	echo json_encode( array('message' => 'Student  Record Not DELETED','status' => false ));
}

?>