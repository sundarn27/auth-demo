<?php
session_start();

print_r($_SESSION);

require '../vendor/autoload.php';

// $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$mongo = new MongoDB\Client("mongodb://localhost:27017");

$db = $mongo->test;

$collection = $db->users;

// if($_POST){
// 	$insert= array(
// 		'name'-> $_POST['name'],
// 		'age'-> $_POST['age'],
// 		'dob'-> $_POST['dob'],
// 		'contact'-> $_POST['contact']
// 	);
// 	if($collection->insert($insert)){
// 		echo "Data Inserted";
// 	}
// 	else{
// 		echo "error";
// 	}
// }
// else{
// 	echo "No Data Stored";
// }


	$user_id = $_SESSION["user_id"];

	$name = $_POST["name"];
	$age = $_POST["age"];
	$dob = $_POST["dob"];
	$contact = $_POST["contact"];
	
	// Update user details in MongoDB
	
	$document = [
		'_id' => new MongoDB\BSON\ObjectID(),
		'user_id' => $user_id,
		'name' => $name,
		'age' => $age, 
		'dob' => $dob, 
		'contact' => $contact
	];

	$filter = ['user_id' => $user_id];

	$update = [
		'$set' => [
			'user_id' => $user_id,
			'name' => $name,
			'age' => $age, 
			'dob' => $dob, 
			'contact' => $contact
		]
	];

	$options = [ 'upsert' => true ];
	
	$collection->updateOne($filter, $update, $options);
	





	// Connect to MongoDB database
	// $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	
	// Get user ID from session
	// $user_id = $_SESSION["user_id"];
	// $redis = new Redis();
	// $redis->connect('127.0.0.1', 6379);
	// $user_id = $redis->get($session_id);
	
	// Get form data
	// $name = $_POST["name"];
	// $age = $_POST["age"];
	// $dob = $_POST["dob"];
	// $contact = $_POST["contact"];
	
	// // Update user details in MongoDB
	// $bulk = new MongoDB\Driver\BulkWrite();
	// $bulk->update(
	// 	["_id" => new MongoDB\BSON\ObjectID($user_id)],
	// 	['$set' => [
	// 		"name" => $name,
	// 		"age" => $age,
	// 		"dob" => $dob,
	// 		"contact" => $contact
	// 	]]
	// );
	
	// try {
	// 	$result = $manager->executeBulkWrite('test.users', $bulk);
	// 	echo "success";
	// } catch (Exception $e) {
	// 	echo "error";
	// }
?>
