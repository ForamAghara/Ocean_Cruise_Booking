<?php

if(isset($_SESSION['Count']) && $_SESSION['Count'] >= 0){
	session_destroy();
	$_SESSION['Count'] = 0;
}
else {
	session_start();
	$_SESSION['Count'] = 0;
}

function sanitise_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;  
		}

$firstname = sanitise_input($_POST["firstname"]);
$lastname = sanitise_input($_POST["lastname"]);
$email = sanitise_input($_POST["email"]);
$street = sanitise_input($_POST["street"]);
$suburb = sanitise_input($_POST["suburb"]);
$state = sanitise_input($_POST["state"]);
$postcode = sanitise_input($_POST["postcode"]);
$number = sanitise_input($_POST["number"]);
$preference = sanitise_input($_POST["preference"]);
$startdate = sanitise_input($_POST["startdate"]);
$enddate = sanitise_input($_POST["enddate"]);
$product = sanitise_input($_POST["product"]);
$price = sanitise_input($_POST["price"]);
$destination = sanitise_input($_POST["destination"]);
$guest = sanitise_input($_POST["guest"]);
$features = sanitise_input($_POST["features"]);
$total = sanitise_input($_POST["total"]);
$comment = sanitise_input($_POST["comments"]);

$CardType = sanitise_input($_POST["card_type"]);
$name_card = sanitise_input($_POST["name_card"]);
$card_number = sanitise_input($_POST["card_number"]);
$date_expire = sanitise_input($_POST["date_expire"]);
$CVV = sanitise_input($_POST["CVV"]);


$error = True;

$pattern1="/^[a-zA-Z]{1,25}$/";
$pattern2="/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/";
$pattern3="/^[0-9a-zA-Z ]{1,40}$/"; 
$pattern4="/^[a-zA-Z]{1,20}$/";
$pattern5="/^[0-9]{4}$/";
$pattern6="/^[0-9]{10}$/";
$pattern7="/^[1-9]{1,4}$/";
$pattern8="/^[a-zA-Z ]{1,40}$/";
$pattern9="/^0[1-9]|1[0-2]\/[0-9]{1,2}$/";
$pattern10="/^[0-9]{3}$/";


if(isset($_POST["firstname"]) && !empty($_POST["firstname"])){
	$x = preg_match($pattern1, $firstname);
	if ($x == 1){
		#echo "<p>FirstName : ", $firstname, "</p>";
	}
	else {
		$firstnameerr = "Firstname should contain only Small or Capital alphabets and no numbers. Also it should be of length between 1 to 25.";
		#echo "<p>FirstName : Error - ", $firstnameerr,"</p>";
		$error = False;
		$_SESSION['firstnameerr'] = $firstnameerr;
	}
}	
else{
	$firstnameerr = "FirstName is required";
	#echo "<p>FirstName : Error - ", $firstnameerr, "</p>"; 
	$error = False;
	$_SESSION['firstnameerr'] = $firstnameerr;
}


if(isset($_POST["lastname"]) && !empty($_POST["lastname"])){
	$x = preg_match($pattern1, $lastname);
	if ($x == 1){
		#echo "<p>LastName : ", $lastname, "</p>";
	}
	else {
		$lastnameerr = "Lastname should contain only Small or Capital alphabets and no numbers. Also it should be of length between 1 to 25.";
		#echo "<p>LastName : Error - ", $lastnameerr,"</p>";
		$error = False;
		$_SESSION['lastnameerr'] = $lastnameerr;
	}
}	
else{
	$lastnameerr = "LastName is required";
	#echo "<p>LastName : Error - ", $lastnameerr, "</p>"; 
	$error = False;
	$_SESSION['lastnameerr'] = $lastnameerr;
}


if(isset($_POST["email"]) && !empty($_POST["email"])){
	$x = preg_match($pattern2, $email);
	if ($x == 1){
		#echo "<p>Email : ", $email, "</p>";
	}
	else {
		$emailerr = "Email should contain in the format test@gmail.com you can add numbers as well.";
		#echo "<p>Email : Error - ", $emailerr,"</p>";
		$error = False;
		$_SESSION['emailerr'] = $emailerr;
	}
}	
else{
	$emailerr = "Email is required";
	#echo "<p>Email : Error - ", $emailerr, "</p>";
	$error = False; 
	$_SESSION['emailerr'] = $emailerr;
}



if(isset($_POST["street"]) && !empty($_POST["street"])){
	$x = preg_match($pattern3, $street);
	if ($x == 1){
		#echo "<p>Street : ", $street, "</p>";
	}
	else {
		$streeterr = "Street should contain only Small or Capital alphabets and numbers. Also it should be of length between 1 to 40.";
		#echo "<p>Street : Error - ", $streeterr,"</p>";
		$error = False;
		$_SESSION['streeterr'] = $streeterr;

	}
}	
else{
	$streeterr = "Street is required";
	#echo "<p>Street : Error - ", $streeterr, "</p>"; 
	$error = False;
	$_SESSION['streeterr'] = $streeterr;
}



if(isset($_POST["suburb"]) && !empty($_POST["suburb"])){
	$x = preg_match($pattern4, $suburb);
	if ($x == 1){
		#echo "<p>Suburb : ", $suburb, "</p>";
	}
	else {
		$suburberr = "Suburb should contain only Small or Capital alphabets and no numbers. Also it should be of length between 1 to 20.";
		#echo "<p>Suburb : Error - ", $suburberr,"</p>";
		$error = False;
		$_SESSION['suburberr'] = $suburberr;
	}
}	
else{
	$suburberr = "Suburb is required";
	#echo "<p>Suburb : Error - ", $suburberr, "</p>"; 
	$error = False;
	$_SESSION['suburberr'] = $suburberr;
}



if(isset($_POST["state"]) && !empty($_POST["state"])){
	#echo "<p>State : ", $state, "</p>";
}
else{
	$staterr = "State is required";
	#echo "<p>State : Error - ", $staterr, "</p>";
	$error = False;
	$_SESSION['staterr'] = $staterr;
}



if(isset($_POST["postcode"]) && !empty($_POST["postcode"])){
	$x = preg_match($pattern5, $postcode);
	if ($x == 1){

		  if($state=="VIC"){
		    $vic_regex = "/^[3,8]{1}[0-9]{3}$/";
		    $vic = preg_match($vic_regex, $postcode);
		    if($vic == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Victoria must start with 3 or 8 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="NSW"){
		    $nsw_regex = "/^[1,2]{1}[0-9]{3}$/";
		    $nsw = preg_match($nsw_regex, $postcode);
		    if($nsw == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in New South Wales must start with 1 or 2 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		    
		  }
		  if($state=="QLD"){
		    $qld_regex = "/^[4,9]{1}[0-9]{3}$/";
		    $qld = preg_match($qld_regex, $postcode);
		    if($qld == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Queensland must start with 4 or 9 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="NT"){
		    $nt_regex = "/^0[0-9]{3}$/";
		    $nt = preg_match($nt_regex, $postcode);
		    if($nt == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Northern Territory must start with 0 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="WA"){
		    $wa_regex = "/^6[0-9]{3}$/";
		    $wa = preg_match($wa_regex, $postcode);
		    if($wa == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Western Australia must start with 6 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="SA"){
		    $sa_regex = "/^5[0-9]{3}$/";
		    $sa = preg_match($sa_regex, $postcode);
		    if($sa == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in South Australia must start with 5 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="TAS"){
		    $tas_regex = "/^7[0-9]{3}$/";
		    $tas = preg_match($tas_regex, $postcode);
		    if($tas == 1){
		      #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Tasmania must start with 7 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
		  if($state=="ACT"){
		    $act_regex = "/^0[0-9]{3}$/";
		    $act = preg_match($act_regex, $postcode);
		    if($act == 1){
		     #echo "<p>PostCode : ", $postcode, "</p>";
		    }
		    else{
		      $postcodeerr = "Post code in Australian Capital Territory must start with 0 and be of length 4";
		      #echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		      $error = False;
		      $_SESSION['postcodeerr'] = $postcodeerr;
		    }
		  }
	}
	else {
		$postcodeerr = "PostCode should contain only numbers. Also it should be length of 4.";
		#echo "<p>PostCode : Error - ", $postcodeerr,"</p>";
		$error = False;
		$_SESSION['postcodeerr'] = $postcodeerr;
	}
}	
else{
	$postcodeerr = "PostCode is required";
	#echo "<p>PostCode : Error - ", $postcodeerr, "</p>"; 
	$error = False;
	$_SESSION['postcodeerr'] = $postcodeerr;
}



if(isset($_POST["number"]) && !empty($_POST["number"])){
	$x = preg_match($pattern6, $number);
	if ($x == 1){
		#echo "<p>PhoneNumber : ", $number, "</p>";
	}
	else {
		$numbererr = "PhoneNumber should contain only numbers. Also it should be length of 10.";
		#echo "<p>PhoneNumber : Error - ", $numbererr,"</p>";
		$error = False;
		$_SESSION['numbererr'] = $numbererr;
	}
}	
else{
	$numbererr = "PhoneNumber is required";
	#echo "<p>PhoneNumber : Error - ", $numbererr, "</p>"; 
	$error = False;
	$_SESSION['numbererr'] = $numbererr;
}

if(isset($_POST["startdate"]) && !empty($_POST["startdate"]) && isset($_POST["enddate"]) && !empty($_POST["enddate"])) {
	if ((strtotime($startdate)) < (strtotime($enddate))){
		#echo "<p>Start Date : ", $startdate, "</p>";
		#echo "<p>End Date : ", $enddate, "</p>";
	}
	else {
		$dateerr = "Start Date should be smaller than End Date";
		#echo "<p>Start Date : Error - ", $dateerr,"</p>";
		#echo "<p>End Date : Error - ", $dateerr,"</p>";
		$error = False;
		$_SESSION['dateerr'] = $dateerr;
	}
}	
else{
	$dateerr = "Start and Ending Date are required";
	#echo "<p>Start Date : Error - ", $dateerr, "</p>";
	#echo "<p>End Date : Error - ", $dateerr, "</p>"; 
	$error = False;
	$_SESSION['dateerr'] = $dateerr;
}


if(isset($_POST["guest"]) && !empty($_POST["guest"])){
	$x = preg_match($pattern7, $guest);
	if ($x == 1){
		#echo "<p>Guest : ", $guest, "</p>";
	}
	else {
		$guesterr = "Number of guest should not be 0 and contain only numbers. Also it should be of length between 1 to 4.";
		#echo "<p>Guest : Error - ", $guesterr,"</p>";
		$error = False;
		$_SESSION['$guesterr'] = $guesterr;
	}
}	
else{
	$guesterr = "Guest is required";
	#echo "<p>Guest : Error - ", $guesterr, "</p>"; 
	$error = False;
	$_SESSION['$guesterr'] = $guesterr;
}


if(isset($_POST["card_type"]) && !empty($_POST["card_type"])){
		#echo "<p>Card Type : ", $CardType, "</p>";
}	
else{
	$card_typeerr = "Card Type is required";
	#echo "<p>Card Type : Error - ", $card_typeerr, "</p>"; 
	$error = False;
	$_SESSION['card_typeerr'] = $card_typeerr;
}




if(isset($_POST["name_card"]) && !empty($_POST["name_card"])){
	$x = preg_match($pattern8, $name_card);
	if ($x == 1){
		#echo "<p>Card Name : ", $name_card, "</p>";
	}
	else {
		$name_carderr = "Card name should contain only Small or Capital alphabets. Also it should be of length between 1 to 40.";
		#echo "<p>Card Name : Error - ", $name_carderr,"</p>";
		$error = False;
		$_SESSION['name_carderr'] = $name_carderr;
	}
}	
else{
	$name_carderr = "Card Name is required";
	#echo "<p>Card Name : Error - ", $name_carderr, "</p>"; 
	$error = False;
	$_SESSION['name_carderr'] = $name_carderr;
}

if(isset($_POST["card_number"]) && !empty($_POST["card_number"])){
	 if($CardType == "VISA"){
	    $visa_regex = "/^4[0-9]{15}$/";
	    $visa = preg_match($visa_regex,$card_number); 
	    if($visa == 1){
	      #echo "<p>Card Number : ", $card_number, "</p>";
	    }
	    else{
	      $card_numbererr = "Visa cards have 16 digits and start with a 4";
	      #echo "<p>Card Number : Error - ", $card_numbererr, "</p>";
	      $error = False;
	      $_SESSION['card_numbererr'] = $card_numbererr;
	    }
	  }
	  if($CardType=="MASTERCARD"){
	    $master_regex = "/^5[1-5]{1}[0-9]{14}$/";
	    $master = preg_match($master_regex,$card_number);
	    if($master == 1){
	      #echo "<p>Card Number : ", $card_number, "</p>";
	    }
	    else{
	      $card_numbererr = "MasterCard have 16 digits and start with digits 51 through to 55";
	      #echo "<p>Card Number : Error - ", $card_numbererr, "</p>";
	      $error = False;
	      $_SESSION['card_numbererr'] = $card_numbererr;
	    }
	  }
	  if($CardType =="AMERICAN_EXPRESS"){
	    $american_regex = "/^3[4-7]{1}[0-9]{13}$/";
	    $american = preg_match($american_regex, $card_number);
	    if($american == 1){
	     #echo "<p>Card Number : ", $card_number, "</p>"; 
	    }
	    else{
	      $card_numbererr = "American Express has 15 digits and starts with 34 or 37";
	      #echo "<p>Card Number : Error - ", $card_numbererr, "</p>";
	      $error = False;
	      $_SESSION['card_numbererr'] = $card_numbererr;
	    }
	  }
}	
else{
	$card_numbererr = "Card Number is required";
	#echo "<p>Card Number : Error - ", $card_numbererr, "</p>"; 
	$error = False;
	$_SESSION['card_numbererr'] = $card_numbererr;
}


if(isset($_POST["date_expire"]) && !empty($_POST["date_expire"])){
	$x = preg_match($pattern9, $date_expire);
	if ($x == 1){
		#echo "<p>Expire Date : ", $date_expire, "</p>";
	}
	else {
		$date_expireerr = "Expire Date should be in the format mm/yy and month values should be in between 01 to 12.";
		#echo "<p>Expire Date : Error - ", $date_expireerr,"</p>";
		$error = False;
		$_SESSION['date_expireerr'] = $date_expireerr;

	}
}	
else{
	$date_expireerr = "Expire Date is required";
	#echo "<p>Expire Date : Error - ", $date_expireerr, "</p>"; 
	$error = False;
	$_SESSION['date_expireerr'] = $date_expireerr;
}



if(isset($_POST["CVV"]) && !empty($_POST["CVV"])){
	$x = preg_match($pattern10, $CVV);
	if ($x == 1){
		#echo "<p>CVV : ", $CVV, "</p>";
	}
	else {
		$CVVerr = "CVV should only contain 3 numbers.";
		#echo "<p>CVV : Error - ", $CVVerr,"</p>";
		$error = False;
		$_SESSION['CVVerr'] = $CVVerr;
	}
}	
else{
	$CVVerr = "CVV is required";
	#echo "<p>CVV : Error - ", $CVVerr, "</p>"; 
	$error = False;
	$_SESSION['CVVerr'] = $CVVerr;
}




$_SESSION['firstname'] = $firstname ;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['street'] = $street;
$_SESSION['suburb'] = $suburb;
$_SESSION['state'] = $state;
$_SESSION['postcode'] = $postcode;
$_SESSION['number'] = $number;
$_SESSION['preference'] = $preference;
$_SESSION['startdate'] = $startdate;
$_SESSION['enddate'] = $enddate;
$_SESSION['product'] = $product;
$_SESSION['price'] = $price;
$_SESSION['destination'] = $destination;
$_SESSION['guest'] = $guest;
$_SESSION['features'] = $features;
$_SESSION['total'] = $total;
$_SESSION['comment'] = $comment;
$_SESSION['card_type'] = $CardType;
$_SESSION['name_card'] = $name_card;
$_SESSION['card_number'] = $card_number;
$_SESSION['date_expire'] = $date_expire;
$_SESSION['CVV'] = $CVV;



if($error){
	#echo "All good!!";
	$order_dt = date("Y-m-d h:i:sa");
	require_once ("settings.php");
	$conn = @mysqli_connect($host,$user,$pass,$sql_db);

	if(!$conn){
	echo "<p>Database connection failure</p>";
	} 
	else{
	$query= "INSERT INTO orders (order_cost,order_time, order_status, firstname, lastname, email, street, suburb, state, postcode, pnumber, preference, startdate, enddate, product, price, destination, guest, features, comments, card_type, card_name, card_number, date_expiry, cvv) VALUES ('$total','$order_dt','PENDING','$firstname','$lastname','$email','$street','$suburb','$state','$postcode','$number','$preference', '$startdate', '$enddate', '$product','$price', '$destination', '$guest', '$features', '$comment', '$CardType', '$name_card', '$card_number', '$date_expire', '$CVV')";

	$result= mysqli_query($conn,$query);
	if($result){
		#echo "<p>Order Created Successfully!!!</p>";
		$query2 = "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1";
		$result2 = mysqli_query($conn,$query2);
		$lastrow = mysqli_fetch_assoc($result2);
		$_SESSION['Last_Order'] = $lastrow["order_id"];
		header("Location: ./receipt.php");
	}
	else {
		echo "<p>Something went wrong</p>";
	}


	}

	mysqli_close($conn);
	

}
else{
	header("Location: ./fix_order.php");
}

?>