<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body bgcolor = "#D2B48C">
<pre>
<form action = "ABozzelli_BB5.php" method = "POST">

<?
//FILE: ABozzelli_BB4.php
//PROG: Andrew Bozzelli
//PURP: Process check boxes from BB3 display choices, process new selections, sent to bb5 --->

       define("ROOTPW", "Terri_33");
       extract($_POST);

       if (!isset($choices))
       {
       printf("No titles selected. ");
       printf("Please push your back button and choose at least one, or press the home button.\n");
?>
<form><input type="button" value="HOME" onClick="window.location.href='Bozzelli_fp.html'"></form>
<?
       }

       else
       {
       $link = mysqli_connect("localhost", "root", ROOTPW);
       if (!$link)
          die("Could not connect: " . mysql_error());



       if (!mysqli_select_db($link,"cpt283db"))
          die("Problem with the database: " . mysql_error());
       printf("<h1>Welcome to BB's Online Shopping Center!</h1>");
       printf("<h1>Here are your purchases from $department, $username!</h1>");
?>

<table cellspacing="2" cellpadding="2" id="tabid" border='1'>
<thead>
<tr>
<th><strong>AUTHOR/ARTIST</strong></th>
<th><strong>TITLE</strong></th>
<th><strong>PRICE</strong></th>
<th><strong>SUMMARY</strong></th>

</tr>
</thead>
<tbody>
<?

         $total = 0;
         foreach ($choices as $value)
         {
         $query = "SELECT products.ID, products.entertainerauthor, products.title, prodInv.UnitPrice,
products.summary FROM products INNER JOIN prodInv ON products.ID = prodinv.ID WHERE products.ID = '$value' ORDER BY entertainerauthor";
         $result = mysqli_query($link,$query);

           if ($result)
           {
               $row = mysqli_fetch_assoc($result);
               {
                $ID = $row['ID'];
                $name = $row['entertainerauthor'];
                $title = $row['title'];
                $price = $row['UnitPrice'];
                $summary = $row['summary'];
                $total += $price;
                }

?>

<tr>
<td><?php echo $name;?></td>
<td><?php echo $title;?></td>
<td><?php echo $price;?></td>
<td><?php echo $summary;?></td>
</tr>

<?

         }
         else
             printf("Error with the DB result set!\n");


         }
         printf("<h2>Your total is: $total</h2>");
?>
</tbody></table><br />
Payment Information
Name:<input type = "text" name = "username" />
Address:<input type = "text" name = "address" />
Card Type:<input type = "text" name = "card" />
Card Number:<input type = "text" name = "number" maxlength = "16"/>
</font>
<input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
<input type="hidden" name="username" value="<? echo $username;?>">
</form></body></html>
<?

mysqli_close($link);
}
?>
</pre>
</body>
</html>
