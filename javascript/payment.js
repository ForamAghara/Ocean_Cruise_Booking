"use strict";
var debug=true;
//Function to calculate total cost of the trip
function calc_Cost(product,guest) {
	return parseInt(product)*parseInt(guest);
}


// Function to load the localStorage Data stored from enquire.html to payment.html file
function LoadData(){

  if(typeof(Storage) !== "undefined") {

//Getting the product from user and splitting product name and price of the product. Also calculating the total cost
var prod = localStorage.getItem("product");
var split_prod = prod.split("-");
var total = calc_Cost(split_prod[1],localStorage.getItem("guest"));
  
//Displaying the passed data from equire page to payment page
document.getElementById("payment_firstname").innerHTML = localStorage.getItem("firstname");
document.getElementById("payment_lastname").innerHTML = localStorage.getItem("lastname");
document.getElementById("payment_email").innerHTML = localStorage.getItem("email");
document.getElementById("payment_street").innerHTML = localStorage.getItem("street");
document.getElementById("payment_suburb").innerHTML = localStorage.getItem("suburb");
document.getElementById("payment_state").innerHTML = localStorage.getItem("state");
document.getElementById("payment_postcode").innerHTML = localStorage.getItem("postcode");
document.getElementById("payment_number").innerHTML = localStorage.getItem("number");
document.getElementById("payment_preference").innerHTML = localStorage.getItem("preference");
document.getElementById("payment_startdate").innerHTML = localStorage.getItem("startdate");
document.getElementById("payment_enddate").innerHTML = localStorage.getItem("enddate");
document.getElementById("payment_product").innerHTML = split_prod[0];
document.getElementById("payment_price").innerHTML = split_prod[1];
document.getElementById("payment_destination").innerHTML = localStorage.getItem("destination");
document.getElementById("payment_guest").innerHTML = localStorage.getItem("guest");
document.getElementById("payment_features").innerHTML = localStorage.getItem("features");
document.getElementById("payment_comments").innerHTML = localStorage.getItem("comment");
document.getElementById("payment_total").innerHTML = total;


// Enhancement-2 : Combining firstname and lastname and saving it as value for the input field of card holder name in payment page
document.getElementById("name_card").value = localStorage.getItem("firstname") + ' ' + localStorage.getItem("lastname");


//hidden form elements of the enquire page 
document.getElementById("form0").value = localStorage.getItem("firstname");
document.getElementById("form1").value = localStorage.getItem("lastname");
document.getElementById("form2").value = localStorage.getItem("email");
document.getElementById("form3").value = localStorage.getItem("street");
document.getElementById("form4").value = localStorage.getItem("suburb");
document.getElementById("form5").value = localStorage.getItem("state");
document.getElementById("form6").value = localStorage.getItem("postcode");
document.getElementById("form7").value = localStorage.getItem("number");
document.getElementById("form8").value = localStorage.getItem("preference");
document.getElementById("form9").value = localStorage.getItem("startdate");
document.getElementById("form10").value = localStorage.getItem("enddate");
document.getElementById("form11").value = split_prod[0];
document.getElementById("form12").value = split_prod[1];
document.getElementById("form13").value = localStorage.getItem("destination");
document.getElementById("form14").value = localStorage.getItem("guest");
document.getElementById("form15").value = localStorage.getItem("features");
document.getElementById("form17").value = localStorage.getItem("comment");
document.getElementById("form16").value = total;



 }else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }
}

// Function to validate 3 different types of card 
function validatePayment(){

if(!debug){

	var type = document.getElementById("card_type").value;
	var card_number = document.getElementById("card_number").value;
	
	//checking regex for the different cards and alerting the message if wrong value passed.
	  if(type=="VISA"){
	    var visa_regex = /^4[0-9]{15}$/;
	    if(visa_regex.test(card_number)){
	      //alert("Correct Card Number");
	    }
	    else{
	      alert("Visa cards have 16 digits and start with a 4");
	      document.getElementById("card_number").value = "";
	    }
	  }
	  if(type=="MASTERCARD"){
	    var master_regex = /^5[1-5]{1}[0-9]{14}$/;
	    if(master_regex.test(card_number)){
	      //alert("Correct Card Number");
	    }
	    else{
	      alert("MasterCard have 16 digits and start with digits 51 through to 55");
	      document.getElementById("card_number").value = "";
	    }
	    
	  }
	  if(type=="AMERICAN_EXPRESS"){
	    var american_regex = /^3[4-7]{1}[0-9]{13}$/;
	    if(american_regex.test(card_number)){
	      //alert("Correct Card Number");
	    }
	    else{
	      alert("American Express has 15 digits and starts with 34 or 37");
	      document.getElementById("card_number").value = "";
	    }
	  }
}
}

//Function to destroy the localStorage data and redirect to enquire page on Cancel button click
function Redirect(){
	localStorage.clear();
	window.location.href = "./enquire.php";
}

//init function called on window on load function
function init()
{
	//Loading the localStorage Data
	LoadData();

	//On payment form submission check for the card details validation
	document.getElementById("payment_form").addEventListener("submit", validatePayment);

	//On Cancel the page will be redirected to enquire page
	document.getElementById("cancel").addEventListener("click", Redirect);

}

window.onload = init;
