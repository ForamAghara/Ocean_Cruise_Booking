<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Ocean Cruise Booking" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="Foram Aghara" content="A Lecturer"  />
  <link href="styles/style.css" rel="stylesheet">

  <script src="javascript/enquire.js" ></script>
  <title>Ocean Cruise Booking</title>
  
</head>

<body id="enquire_page">

<?php include "header.inc";?>


<form id="enquire_form" method="post" action="payment.php" novalidate="novalidate">

<h1>Send us an enquiry form and we will get in touch with you soon!!!</h1>
  <fieldset>
      <label for="first_name"><strong>First Name</strong></label> 
      <input type="text" name= "First name" id="first_name" pattern="^[a-zA-Z ]+$"  maxlength="25" size="25" required="required"/>
   </fieldset>

   <fieldset>
      <label for="last_name"><strong>Last Name</strong></label> 
      <input type="text" name= "Last name" id="last_name" pattern="^[a-zA-Z ]+$"  maxlength="25" size="25" required="required"/>
    </fieldset> 

    <fieldset>
      <label for="email"><strong>Email address</strong></label> 
      <input type="email" name= "Email address" id="email" size="25"  required="required"/>
    </fieldset>  


  <fieldset>
    <legend><strong>Address</strong></legend>
      <table>
        <tr>
          <td> <label for="street_address"><strong>Street Address</strong></label> </td>
          <td> <input type="text" name= "Street address" id="street_address" pattern="^[a-zA-Z ]+$"  maxlength="40" size="40" required="required"/></td>
  
          <td> <label for="suburb"><strong>Suburb/Town</strong></label> </td>
		  <td> <input type="text" name= "Suburb/Town" id="suburb" pattern="^[a-zA-Z ]+$"  maxlength="20" size="25" required="required"/></td>
        </tr>
		<tr>
		<td><label for="state"><strong>State</strong></label></td> 
		<td>
				<select name="state" id="state" >
				<option value="Please Select">Please Select</option>      
				<option value="VIC">VIC</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
				<option value="NT">NT</option>
				<option value="WA">WA</option>
				<option value="SA">SA</option>
				<option value="TAS">TAS</option>
				<option value="ACT">ACT</option>
				</select>
		</td>
		<td><label for="postcode"><strong>Postcode</strong></label></td> 
		<td><input type="text" name= "postcode" id="postcode"   minlength="4" maxlength="4" size="4" required="required"/></td>
		</tr>
      </table>
   </fieldset> 

   <fieldset>
      <label for="number"><strong>Phone Number</strong></label> 
      <input type="text" name= "Phone Number" id="number" pattern="^[0-9]+$" minlength="10" maxlength="10" size="25" required="required" placeholder="0400000001" />
   </fieldset> 

   <fieldset>
        <strong>Preferred Contact</strong>
    <table>   
		<tr>
          <td><label for="Email">Email</label> 
            <input type="radio" id="Email" name="contact" value="Email" checked required />
          </td>
          <td><label for="post">Post</label> 
            <input type="radio" id="post" name="contact" value="post"/>
          </td>
          <td><label for="phone">Phone</label> 
            <input type="radio" id="phone" name="contact" value="phone"/>
          </td>
        </tr>
      </table> 
   </fieldset>
	
	<fieldset>
      <label for="startDate"><strong>Trip Start Date</strong></label> 
        	<input type="date" id="startDate" name="startDate" required="required" />
        <label for="endDate"><strong>Trip End Date</strong></label> 
        	<input type="date" id="endDate" name="endDate" required="required" />
	</fieldset>

<fieldset>
      <label for="product"><strong>Cruise and Price</strong></label> 
      <select name="Product" id="product">
        <option value="Please Select">Please Select</option>      
        <option value="Cruise 1-1800">Cruise 1 price 1800$</option>
        <option value="Cruise 2-1500">Cruise 2 price 1500$</option>
        <option value="Cruise 3-1900">Cruise 3 price 1900$</option>
        <option value="Cruise 4-2000">Cruise 4 price 2000$</option>
        <option value="Cruise 5-2500">Cruise 5 price 2500$</option>
      </select>

      <label for="destination"><strong>Trip Destination</strong></label> 
      <select name="Destination" id="destination" >
        <option value="Please Select">Please Select</option>      
        <option value="Australia">Australia </option>
        <option value="Indonesia">Indonesia </option>
        <option value="Maldives">Maldives </option>
        <option value="Singapore">Singapore </option>
        <option value="Dubai">Dubai </option>
      </select>

      <label for="number"><strong>Number of Guest</strong></label> 
      <input type="text" name= "Guest" id="Guest" pattern="^[0-9]+$" minlength="1" maxlength="4" size="4" required="required" placeholder="01" />

</fieldset>


<fieldset>
      <strong>Product Features</strong>
      <table>
        <tr>
          <td><label for="cuisine">Cuisine</label> 
            <input type="checkbox" id="cuisine" name="category[]" value="Cuisine" checked="checked"/>
          </td>
          <td><label for="spa">Spa</label> 
            <input type="checkbox" id="spa" name="category[]" value="Spa"/>
          </td>
          <td><label for="theater">Theater</label> 
            <input type="checkbox" id="theater" name="category[]" value="Theater"/>
          </td>
          <td><label for="casino">Bar & Casino</label> 
            <input type="checkbox" id="casino" name="category[]" value="Bar & Casino"/>
          </td>
          <td><label for="internet">Internet</label> 
            <input type="checkbox" id="internet" name="category[]" value="Internet"/>
          </td>
        </tr>
		<tr><td colspan="5"></td></tr>
		<tr><td colspan="5">Most of the facilities you can use for free but you need to pay for this facilities.</td></tr>
      </table>
  </fieldset>


  <fieldset>
    <table>
    <tr>  
      <td><label for="comments"><strong>Comments</strong></label></td>
      <td><textarea id="comments" name="comments" placeholder="Write your comments..." rows="4" cols="40"></textarea></td>
    </tr>
  </table>  
  </fieldset>

  <fieldset>
  <input type="Submit" value="Pay Now" id="enquire_submit"/>
  <input type="Reset" value="Reset"/>
  </fieldset>
</form>

<?php include "footer.inc";?>
</body>
</html>
