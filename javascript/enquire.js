"use strict";
var debug = true;

//Enhancement-1 Function to calculate the difference between startdate and enddate and prevent user from selecting smaller enddate compared to  startdate
function show_difference()
{
  if(!debug){
	var d1 = new Date(document.getElementById("startDate").value);
    
    var d2 = new Date(document.getElementById("endDate").value);
    
    var diff_days = d2-d1;

    if(diff_days<0){
       alert("Start Date should be smaller than End Date"); 
       document.getElementById("endDate").value = "" ;
       document.getElementById("startDate").value = "" ;
	}
}
}

//Function to validate the postcode against the state selected by user
function validate_postcode(){
  if(!debug){
  var state = document.getElementById("state").value;
  var postcode = document.getElementById("postcode").value;

  //checking regex for the different cards and alerting the message if wrong value passed.
  if(state=="VIC"){
    var vic_regex = /^[3,8]{1}[0-9]{3}$/;
    if(vic_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in Victoria must start with 3 or 8 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="NSW"){
    var nsw_regex = /^[1,2]{1}[0-9]{3}$/;
    if(nsw_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in New South Wales must start with 1 or 2 and be of length 4");
      document.getElementById("postcode").value = "";
    }
    
  }
  if(state=="QLD"){
    var qld_regex = /^[4,9]{1}[0-9]{3}$/;
    if(qld_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in Queensland must start with 4 or 9 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="NT"){
    var nt_regex = /^0[0-9]{3}$/;
    if(nt_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in Northern Territory must start with 0 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="WA"){
    var wa_regex = /^6[0-9]{3}$/;
    if(wa_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in Western Australia must start with 6 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="SA"){
    var sa_regex = /^5[0-9]{3}$/;
    if(sa_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in South Australia must start with 5 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="TAS"){
    var tas_regex = /^7[0-9]{3}$/;
    if(tas_regex.test(postcode)){
      //alert("Correct Postcode");
    }
    else{
      alert("Post code in Tasmania must start with 7 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
  if(state=="ACT"){
    var act_regex = /^0[0-9]{3}$/;
    if(act_regex.test(postcode)){
     // alert("Correct Postcode");
    }
    else{
      alert("Post code in Australian Capital Territory must start with 0 and be of length 4");
      document.getElementById("postcode").value = "";
    }
  }
}
}


//Function to save the localStorage data from the form in enquire page
function saveData()
{	

	
		var firstname = document.getElementById("first_name");
		localStorage.setItem("firstname", firstname.value);

		var lastname = document.getElementById("last_name");
		localStorage.setItem("lastname", lastname.value);

		var email = document.getElementById("email");
		localStorage.setItem("email", email.value);

		var street = document.getElementById("street_address");
		localStorage.setItem("street", street.value);

		var suburb = document.getElementById("suburb");
		localStorage.setItem("suburb", suburb.value);

		var state = document.getElementById("state");
		localStorage.setItem("state", state.value);

		var postcode = document.getElementById("postcode");
		localStorage.setItem("postcode", postcode.value);

		var phone = document.getElementById("number");
		localStorage.setItem("number", phone.value);

		var preference = get_selected_values();
		localStorage.setItem("preference",preference);

		var start = document.getElementById("startDate");
		localStorage.setItem("startdate", start.value);

		var end = document.getElementById("endDate");
		localStorage.setItem("enddate", end.value);

		var product = document.getElementById("product");
		localStorage.setItem("product", product.value);

		var des = document.getElementById("destination");
		localStorage.setItem("destination", des.value);

		var guest = document.getElementById("Guest");
		localStorage.setItem("guest", guest.value);

		var comment = document.getElementById("comments");
		localStorage.setItem("comment", comment.value);

		var features = get_checked_values();
		localStorage.setItem("features", features);

}

//Function to get all the checkbox checked values in the form
function get_checked_values(){
	var checked = "";
	var cuisine = document.getElementById("cuisine");
	var spa = document.getElementById("spa");
	var casino = document.getElementById("casino");
	var theater = document.getElementById("theater");
	var internet = document.getElementById("internet");

	if(cuisine.checked == true)
		checked = checked + cuisine.value + " - "
	if(spa.checked == true)
		checked = checked + spa.value + " - "
	if(casino.checked == true)
		checked = checked + casino.value + " - "
	if(theater.checked == true)
		checked = checked + theater.value + " - "
	if(internet.checked == true)
		checked = checked + internet.value + " - "
	
	return checked;
}


//Function to get the selected value of radio_button group
function get_selected_values(){
	var r_Email = document.getElementById("Email");
	var r_post = document.getElementById("post");
	var r_phone = document.getElementById("phone");
	var radio_selected = "";
	if(r_Email.checked == true)
		radio_selected = r_Email.value;
	if(r_post.checked == true)
		radio_selected = r_post.value;
	if(r_phone.checked == true)
		radio_selected = r_phone.value;

	return radio_selected;
}


//init function is invoked on window load
function init()
{

  
 
  //Checking difference for the enddate and startdate
	document.getElementById("endDate").addEventListener("change", show_difference);
	document.getElementById("startDate").addEventListener("change", show_difference);

  //calling validate postcode function when a change event is occured
	document.getElementById("postcode").addEventListener("change", validate_postcode);
	document.getElementById("state").addEventListener("change", validate_postcode);

  //invoke saveData function when enquire form is submitted
	document.getElementById("enquire_form").addEventListener("submit", saveData);

}

window.onload = init;
