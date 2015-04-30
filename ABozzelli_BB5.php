<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body bgcolor = "#D2B48C">
<pre>
<?
//FILE : ABozzelli_BB5.php
//PROG : Andrew Bozzelli
//PURP : Display receipt

  extract($_POST);

  if(empty ($address))
            echo("No address entered!! Please press the BACK button.");
  else if (empty ($card))
          echo("No credit card type entered! Please press the BACK button.");
  else if (empty ($number))
          echo("No credit card number entered! Please press the BACK button.");
  else if (strlen($number) < 16)
          echo("Invalid credit card number, must be 16 digits. Please press the BACK button.");

  else
  {
  $last4 = substr($number,-4,4);

?>
<form action = "ABozzelli_BB1.php" method = "POST">

<h1>Thank you for your purchase!</h1>

<h2>Name: <? echo $username;?></h2>
<h2>Address: <? echo $address;?></h2>
<h2>Last 4 digits: <? echo $last4;?></h2>

<? echo ("<h3>Your $card card has been approved!<h3>");?>
<h3>Your items will ship soon.</h3>
<h3>Please print this receipt for your records</h3>

<input type = "submit" value = "BACK TO HOME">
<input type="hidden" name="username" value="<? echo $username;?>">
<input type="hidden" name="enter" value="1">
</form>
</font></html></pre>
<?
}//END ELSE
?>
</body>
</html>
