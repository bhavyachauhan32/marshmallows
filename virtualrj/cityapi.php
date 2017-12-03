<?php

include_once 'mysql_connect.php';
// array for JSON response
$response =array();


// get all categories from categories table
	$result = mysql_query("SELECT * from cities")  or die(mysql_error());


// check for empty result
if (mysql_num_rows($result) > 0) {

	    // looping through all results
      // products node
    $response["cities"] = array();

	while($row=mysql_fetch_row($result))
      {
      	// temp user array
        $city = array();
        $city["cityId"] = $row[0];
        $city["cityName"] = $row[1];
       
         array_push($response["cities"], $city);      
      }

    $response["success"] = 1;
    // echoing JSON response
    echo json_encode($response);
	}
else
{
	// no products found
    $response["success"] = 0;
    $response["message"] = "No city found";
 
    // echo no users JSON
    echo json_encode($response);
}

?>