 <?php
 //establish link with the "my_db" mySql database
 include_once('db_connection.php');
 
  // fetch form data from POST and assign to string variables 
 $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
 $age = mysqli_escape_string($link, $_POST['age']);
 
 // insert into my_db's table PERSON the values
 $sql= "INSERT INTO Persons VALUES ('$firstname', '$lastname', '$age')"; //Insert into new tuple into SQL RDBMS
 if (!mysqli_query($link,$sql)) { 
	die('Error: ' . mysqli_error($link));
 }
 
 
 //Get people from Persons relation to display
 if(!($result = mysqli_query($link, "SELECT * FROM PERSONS"))) {
	die('Error: ' . mysqli_error($link));
 }
 
 // get back resultSet as a MySQL associative array
 $row = mysqli_fetch_array($result, MYSQL_ASSOC);
 // loop over associative array and print data from each row
 while($row = mysqli_fetch_array($result)) {
   echo 'Firstname: ' . $row['FirstName'] . ", Lastname: " . $row['LastName'] . ", Age: " . $row['Age'];
   echo " ";
 }
 
 // Close database connection
 mysqli_close($link);
 
 // fetch func from json object passed from client-side
 $func = strtolower($_REQUEST['func']);
 
 // take appropriate action by which func was called
 switch ($func) {
     case "save_form":
         $appid=$_REQUEST['appid'];
         $object = save_form($appid);
		 echo $object;
         break;
     default: 
        break;
 }
 
 //web service function that is being requested from Javascript
 function save_form($appid){
         return $appid;
 }

// set up php associate array to encode into json       
 if (!is_null($object)) {
     $jsonObject['success'] = true;
     $jsonObject['error'] = $object;
 }
 else {
     $jsonObject['success'] = false;
     $jsonObject['message'] = $error . $url;
 }
 
     // print out the JSON object
     echo json_encode($jsonObject);
 ?>
