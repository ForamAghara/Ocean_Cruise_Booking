<!DOCTYPE html>
<?php  session_start();
#$_SESSION['Count'] = $_SESSION['Count']+1;
#echo $_SESSION['Count'];?>
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


<h1 >Fix Order Page!!!</h1>


<form id="payment_form"  method="post" action="process_order.php" novalidate="novalidate">


  <fieldset>
    <legend><strong>Please Once Check Your Trip Details</strong></legend>
        
        <?php if(isset($_SESSION['firstnameerr'])){ ?>
        <p>First Name: <input type="text" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname'];?>"> <span><?php echo $_SESSION['firstnameerr'];?> </span> </p>
        <?php } else { ?>
          <input type="hidden" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname'];?>" >
        <?php } ?>  
        
        <?php if(isset($_SESSION['lastnameerr'])){ ?>
        <p>Last Name: <input type="text" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>"> <span><?php echo $_SESSION['lastnameerr'];?> </span> </p>    
        <?php } else { ?>
          <input type="hidden" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>" >
        <?php }?>

        <?php if(isset($_SESSION['emailerr'])) { ?>
        <p>Email: <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];?>"><span><?php echo $_SESSION['emailerr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email'];?>" >
        <?php }?>

        <?php if(isset($_SESSION['streeterr']))  { ?>
        <p>Street: <input type="text" id="street" name="street" value="<?php echo $_SESSION['street'];?>"><span><?php echo $_SESSION['streeterr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" id="street" name="street" value="<?php echo $_SESSION['street'];?>">
        <?php }?>

        <?php if(isset($_SESSION['suburberr']))  { ?>
        <p>Suburb: <input type="text" id="suburb" name="suburb" value="<?php echo $_SESSION['suburb'];?>"><span><?php echo $_SESSION['suburberr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden"  id="suburb" name="suburb" value="<?php echo $_SESSION['suburb'];?>">
        <?php }?>

        <input type="hidden" id="state" name="state" value="<?php echo $_SESSION['state'];?>">

        <?php if(isset($_SESSION['postcodeerr']))  { ?>
        <p>Postcode: <input type="text" id="postcode" name="postcode" value="<?php echo $_SESSION['postcode'];?>"><span><?php echo $_SESSION['postcodeerr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" id="postcode" name="postcode" value="<?php echo $_SESSION['postcode'];?>">
        <?php }?>

        <?php if(isset($_SESSION['numbererr']))  { ?>
        <p>Number: <input type="text" id="number" name="number" value="<?php echo $_SESSION['number'];?>"><span><?php echo $_SESSION['numbererr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" id="number" name="number" value="<?php echo $_SESSION['number'];?>">
        <?php }?>

        <input type="hidden" id="preference" name="preference" value="<?php echo $_SESSION['preference'];?>">

        <?php if(isset($_SESSION['dateerr']))  { ?>
        <p>Trip start date: <input type="date" id="startdate" name="startdate" value="<?php echo $_SESSION['startdate'];?>"><span><?php echo $_SESSION['dateerr'];?> </span></p>
        <p>Trip end date: <input type="date" id="enddate" name="enddate" value="<?php echo $_SESSION['enddate'];?>"><span><?php echo $_SESSION['dateerr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" id="startdate" name="startdate" value="<?php echo $_SESSION['startdate'];?>">
          <input type="hidden" id="enddate" name="enddate" value="<?php echo $_SESSION['enddate'];?>">
        <?php }?>

        <input type="hidden" id="product" name="product" value="<?php echo $_SESSION['product'];?>">
        <input type="hidden" id="price" name="price" value="<?php echo $_SESSION['price'];?>">
        <input type="hidden" id="destination" name="destination" value="<?php echo $_SESSION['destination'];?>">

        <?php if(isset($_SESSION['guesterr']))  { ?>
        <p>Number of guest: <input type="text" name= "guest" id="guest" value="<?php echo $_SESSION['guest'];?>"> <span><?php echo $_SESSION['guesterr'];?> </span></p>
        <?php } else { ?>
          <input type="hidden" name= "guest" id="guest" value="<?php echo $_SESSION['guest'];?>">
        <?php }?>

        <input type="hidden" id="features" name="features" value="<?php echo $_SESSION['features'];?>"/>
        <input type="hidden" id="total" name="total" value="<?php echo $_SESSION['total'];?>"/>
        <input type="hidden" id="comments" name="comments" value="<?php echo $_SESSION['comment'];?>"/>
  </fieldset>



  <fieldset> 
      <legend><strong>Payment Details</strong></legend>
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
           <tr>
            <td> <label for="name_card"><strong>Name on Card</strong></label> </td>
            <td> <input type="text" name="name_card" id="name_card" value="<?php echo $_SESSION['name_card'];?>"/> <span><?php echo (isset($_SESSION['name_carderr']))?$_SESSION['name_carderr']:'';?> </span></td>
          </tr>
          <tr>
              <td> <label for="card_number"><strong>Credit Card Number</strong></label> </td>
              <td> <input type="text" name= "card_number" id="card_number"/><span><?php echo (isset($_SESSION['card_numbererr']))?$_SESSION['card_numbererr']:''; ?> </span></td>
              
          </tr>
          <tr>
            <td><label for="date_expire"><strong>Date of expiry</strong></label></td> 
            <td><input type="text" name= "date_expire" id="date_expire" placeholder="mm/yy" /><span><?php echo (isset($_SESSION['date_expireerr']))?$_SESSION['date_expireerr']:'';?> </span></td>
          
          </tr>
          <tr>
             <td><label for="CVV"><strong>CVV</strong></label></td> 
            <td><input type="text" name= "CVV" id="CVV"/><span><?php echo (isset($_SESSION['CVVerr']))?$_SESSION['CVVerr']:'';?> </span></td>
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
