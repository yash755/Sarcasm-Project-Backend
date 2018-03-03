<?php



$servername = "localhost";
$username = "root";
$password = "Yash!197";
$dbname = "sarcasm_project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}; 
//echo "Connected successfully";


$image_list = array();


$sql = "SELECT * FROM Images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$k = array('id' => $row["sno"] ,'image_url' => $row["imagepath"]);
		array_push($image_list,$k);
//        echo "id: " . $row["sno"]. " - Name: " . $row["imagepath"];
    }
}


$response = array('image_list'=> $image_list, 'base_url' => "http:\\/\\/167.99.15.115\\/sarcasm\\/");

$conn->close();

exit(json_encode($response))
?>
