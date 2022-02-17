<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Ocean Cruise Booking" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="Foram Aghara" content="A Lecturer"  />
  <link href="styles/style.css" rel="stylesheet">
  <script src="javascript/payment.js" ></script>
  <title>Ocean Cruise Booking</title>
  
</head>

<body id="payment_page">

<?php include "header.inc";?>



<form id="payment_form" method="post" action="process_order.php" novalidate="novalidate">

<h1 >Payment Page!!!</h1>

<div>
  <fieldset>
  <legend><strong>Please Once Check Your Trip Details</strong></legend>
  
      <p>First Name: <span id="payment_firstname"> </span> </p>
      <p>Last Name: <span id="payment_lastname"></span> </p>    
      <p>Email: <span id="payment_email"></span></p>
      <p>Street: <span id="payment_street"></span></p>
      <p>Suburb: <span id="payment_suburb"></span></p>
      <p>State: <span id="payment_state"></span></p>
      <p>Postcode: <span id="payment_postcode"></span></p>
      <p>Number: <span id="payment_number"></span></p>
      <p>Preferred Contact: <span id="payment_preference"></span></p>
      <p>Trip start date: <span id="payment_startdate"></span></p>
      <p>Trip end date: <span id="payment_enddate"></span></p>
      <p>Cruise: <span id="payment_product"></span></p>
      <p>Per Person Price: $<span id="payment_price"></span></p>
      <p>Trip destination: <span id="payment_destination"></span></p>
      <p>Number of guest: <span id="payment_guest"></span></p>
      <p>Product Features : <span id="payment_features"></span></p>
      <p>Total Cost: $<span id="payment_total"></span></p>
      <p>Comments: <span id="payment_comments"></span></p>
   
  </fieldset>

</div>

<fieldset>
    <legend><strong>Payment Details</strong></legend>
    <input type="hidden" id="form0" name="firstname" >
    <input type="hidden" id="form1" name="lastname" >
    <input type="hidden" id="form2" name="email" >
    <input type="hidden" id="form3" name="street" >
    <input type="hidden" id="form4" name="suburb" >
    <input type="hidden" id="form5" name="state" >
    <input type="hidden" id="form6" name="postcode" >
    <input type="hidden" id="form7" name="number" >
    <input type="hidden" id="form8" name="preference" >
    <input type="hidden" id="form9" name="startdate" >
    <input type="hidden" id="form10" name="enddate" >
    <input type="hidden" id="form11" name="product" >
    <input type="hidden" id="form12" name="price" >
    <input type="hidden" id="form13" name="destination" >
    <input type="hidden" id="form14" name="guest" >
    <input type="hidden" id="form15" name="features">
    <input type="hidden" id="form16" name="total" >
    <input type="hidden" id="form17" name="comments">

      <table>
        <tr>
          <td><label for="card_type"><strong>Credit Card Type</strong></label></td> 
          <td>
              <select name="card_type" id="card_type" required>    
              <option value="">Please Select</option>     
              <option value="VISA">VISA</option>
              <option value="MASTERCARD">MASTERCARD</option>
              <option value="AMERICAN_EXPRESS">AMERICAN EXPRESS</option>
              </select>
          </td>
         </tr>
         <tr>
          <td> <label for="name_card"><strong>Name on Card</strong></label> </td>
          <td> <input type="text" name="name_card" id="name_card" pattern="^[a-zA-Z ]+$"  maxlength="40" size="25" required="required"/></td>
        </tr>
    <tr>
        <td> <label for="card_number"><strong>Credit Card Number</strong></label> </td>
        <td> <input type="text" name= "card_number" id="card_number"   maxlength="40" size="40" required="required"/></td>
    </tr>
    <tr>
    <td><label for="date_expire"><strong>Date of expiry</strong></label></td> 
    <td><input type="text" name= "date_expire" id="date_expire" placeholder="mm/yy" pattern="\d{1,2}\/\d{2}"  required="required"/></td>
  </tr>
  <tr>
    <td><label for="CVV"><strong>CVV</strong></label></td> 
    <td><input type="text" name= "CVV" id="CVV" pattern="^[0-9]+$"  minlength="3" maxlength="3" size="3" required="required"/></td>
    
    </tr>
      </table>
   </fieldset> 

<fieldset>
  <input type= "Submit" value="Check-Out" id="payment_submit"/>
  <button type="button" id="cancel">Cancel</button>
  </fieldset>
</form>


<?php include "footer.inc";?>

</body>
</html>
