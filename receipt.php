
<!DOCTYPE html>
<?php  session_start();
  $last_order = $_SESSION['Last_Order'];
  require_once ("settings.php");

  $conn = @mysqli_connect($host,$user,$pass,$sql_db);

  if(!$conn){
    echo "<p>Database connection failure</p>";
  } 
  else{
    $query = "SELECT * FROM orders WHERE order_id='$last_order'";
    $result= mysqli_query($conn,$query);
    if($result){
      $order = mysqli_fetch_assoc($result);      
    }
    else {
      echo "<p>Something went wrong</p>";
    }
  }
?>
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


<?php include "header.inc";?>

<body id="receipt_page">


<h1 >Receipt</h1>


<table >
  <tr>
    <td>
      <fieldset> 
            <legend><strong>ORDER DETAILS</strong></legend>
              <table>
                  <tr>
                  <td><strong>Order ID : </strong></td> 
                  <td>
                      <p><?php echo $order['order_id'];?></p>
                  </td>
                 </tr>
                 <tr>
                  <td><strong>Order Date and Time : </strong></td>
                  <td><p><?php echo $order['order_time'];?></p></td>
                </tr>
                <tr>
                    <td><strong>Order Status : </strong></td>
                    <td><?php echo $order['order_status'];?></td>
                    
                </tr>
                <tr>
                    <td><strong>Total Order Price : </strong></td>
                    <td><?php echo "$",$order['order_cost'];?></td>
                </tr>

              </table>
        </fieldset> 
      </td>
      <td>
        <fieldset> 
            <legend><strong>PERSONAL DETAILS</strong></legend>
              <table>
                  <tr>
                  <td><strong>FULL NAME : </strong></td> 
                  <td>
                      <p><?php echo $order['firstname'], " " ,$order['lastname'];?></p>
                  </td>
                 </tr>
                 <tr>
                  <td><strong>Email Address : </strong></td>
                  <td><p><?php echo $order['email'];?></p></td>
                </tr>
                <tr>
                    <td><strong>Phone Number : </strong></td>
                    <td><?php echo $order['pnumber'];?></td>
                </tr>
                <tr>
                    <td><strong>Residential Address : </strong></td>
                    <td><?php echo $order['street'], " " ,$order['suburb'], " " ,$order['state'], " " ,$order['postcode'];?></td>
                </tr>
              </table>
        </fieldset>
      </td>
  </tr>
  <tr>
    <td colspan="2">
        <fieldset> 
            <legend><strong>PRODUCT DETAILS</strong></legend>
              <table>
                  <tr>
                  <td><strong>Trip Duration : </strong></td> 
                  <td>
                      <p><?php echo $order['startdate']," - ", $order['enddate'];?></p>
                  </td>
                 </tr>
                 <tr>
                  <td><strong>Product : </strong></td>
                  <td><p><?php echo $order['product'];?></p></td>
                </tr>
                <tr>
                    <td><strong>Destination : </strong></td>
                    <td><?php echo $order['destination'];?></td>
                </tr>
                <tr>
                    <td><strong>Price per Person : </strong></td>
                    <td><?php echo "$",$order['price'];?></td>
                </tr>
                <tr>
                    <td><strong>Guest : </strong></td>
                    <td><?php echo $order['guest'];?></td>
                </tr>
                <tr>
                    <td><strong>Extra Features : </strong></td>
                    <td><?php echo $order['features'];?></td>
                </tr>
                <tr>
                    <td><strong>Additional Comments : </strong></td>
                    <td><?php echo $order['comments'];?></td>
                </tr>
                <tr>
                    <td><strong>Total Order Price : </strong></td>
                    <td><?php echo "$",$order['order_cost'];?></td>
                </tr>
              </table>
        </fieldset> 
    </td>
  </tr>
</table>
</body>

<?php include "footer.inc";?>
<?php mysqli_close($conn);
session_destroy()?>
</html>
