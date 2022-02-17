<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Ocean Cruise Booking" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="Foram Aghara" content="A Lecturer"  />
  <link href="styles/style.css" rel="stylesheet">
  <title>Ocean Cruise Booking</title>
</head>
<body id="enhancement_page">

<?php include "header.inc";?>



<section class="row">
	<h1>Enhancement</h1>
	<aside>Enhancement done using Javascript in this website  are listed below
        <ol>
		<li> <strong> Trip Start and End Date Validation </strong>
			<ul>
				<li> With the help of Javascript functions and Date() function this unique enhancement was built.</li>
				<li>To implement this code knowledge of Date() function is necessary in JavaScript document.</li>
				<li>Source of this techique / The code from where it was referenced is the website provided in the link here > <a href="https://www.geeksforgeeks.org/how-to-calculate-the-number-of-days-between-two-dates-in-javascript/" target="_blank">Link</a> </li>
				<li>This technique is implemented in the Enquire page in bottom of page where user needs to put start and end date. Every time when start or end date will be checked continuously using 'onchange' javascript event handler. And the error msg is alerted mentioning that startdate should always be smaller than the enddate. <a href="enquire.html#startDate" target="_blank">Link</a></li>
			</ul>
			
		</li>
		
		<li> <strong> Pre-Loading Name of User in the Form </strong>
			<ul>
				<li> This Javascript functionality automatically pre-loads the user's firstname and lastname in the Name on Credit Card field of the payment page by using the values provided by the user in enquire page.</li>
				<li>To implement this code knowledge of localStorage and dynamic assignment of values is necessary in Javascript document.</li>
				<li>Source of this techique / The code from where it was referenced is the website provided in the link here > <a href="https://www.w3schools.com/jsref/prop_text_value.asp" target="_blank">Link</a> </li>
				<li>This technique is implemented in the payment page which is access after filling out the enquire page. The place where this techique is accessible via the link below but no data will be seen, best practice is to fill out the enquire form and the look for the Name on credit card field in the payment details at bottom of the page.Link to the section where it is implemented is here > <a href="payment.html#card_number" target="_blank">Link</a></li>
			</ul>	
		 </li>
        </ol>      
    </aside>
</section>




<?php include "footer.inc";?>




</body>
</html> 