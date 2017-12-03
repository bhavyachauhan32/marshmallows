<?php

include_once 'mysql_connect.php';
// array for JSON response
$response =array();

//if (isset($_POST['categoryId'])) {
if (isset($_POST['cityId'])) {

//$categoryId = $_POST['categoryId'];
$cityId = $_POST['cityId'];

if(!empty($cityId))
	// get all porduct acording to category from products table
	$result = mysql_query("SELECT * from places where city_id='$cityId'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {

	   // looping through all results
      // products node
    $response["places"] = array();

	while($row=mysql_fetch_row($result))
      {
      	// temp user array
		  $place = array();
        $place["placeId"] = $row[0];
        $place["placeName"] = $row[1];
        $place["cityId"] = $row[2];
        $place["history"] = $row[3];
        $place["vrImages"] = $row[4];
        $place["pictures"] = $row[5];
        
    
       array_push($response["places"], $place);      
      }

    $response["success"] = 1;
    $response["message"] = "Places get successfully";
    // echoing JSON response
    echo json_encode($response);
	}
else
{
	// no products found
    $response["success"] = 0;
    $response["message"] = "No place found";
 
    // echo no users JSON
    echo json_encode($response);
}

}
else{
	$response["success"] = 0;
    $response["message"] = "Pease enter cityId";
 
    // echo no users JSON
    echo json_encode($response);
}



//INSERT INTO `naikshas`.`products` (`id`, `pname`, `pimg`, `category`, `price`, `desc`) VALUES (