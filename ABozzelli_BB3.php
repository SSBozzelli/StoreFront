<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body bgcolor = "#D2B48C">
<form action = "ABozzelli_BB4.php" method = "POST">

<?php
     //FILE : ABozzelli_BB3.php
     //PROG : Andrew Bozzelli
     //PURP : Process check boxes from BB2, display choices, process new selections, sent to bb4

     define("ROOTPW", "Terri_33");
     extract($_POST);

     if (!isset($choices))
     {
        printf("No titles selected.\n");
        printf("Please push your back button and choose at least one!\n");
     }

     else
     {
         $link = mysqli_connect("localhost", "root", ROOTPW);
     }
     if (!$link)
        die("Could not connect: " . mysql_error());



     if (!mysqli_select_db($link,"cpt283db"))
        die("Problem with the database: " . mysql_error());

     printf("<h1>Welcome to BB's Online Shopping Center!</h1>");
     printf("<h1>Here are your selections from $department, $username!</h1>");

?>

<table cellspacing="2" cellpadding="2" id="tabid" border='1'>
<thead>
<tr>
<th><strong>Choose</strong></th>
<th><strong>ITEM ID</strong></th>
<th><strong>AUTHOR/ARTIST</strong></th>
<th><strong>TITLE</strong></th>
<th><strong>PRICE</strong></th>
<th><strong>IN STOCK</strong></th>
<th><strong>SUMMARY</strong></th>
</tr>
</thead>
<tbody>


<?


     foreach ($choices as $value)
     {
             $query = "SELECT products.ID, products.entertainerauthor, products.title, prodInv.UnitPrice, prodInv.UnitsInStock,
             products.summary FROM products INNER JOIN prodInv ON products.ID = prodinv.ID WHERE products.ID = '$value' ORDER BY entertainerauthor";
             $result = mysqli_query($link, $query);

             if ($result)
             {
                $row = mysqli_fetch_assoc($result);
                {
                 $ID = $row['ID'];
                 $name = $row['entertainerauthor'];
                 $title = $row['title'];
                 $price = $row['UnitPrice'];
                 $stock = $row['UnitsInStock'];
                 $summary = $row['summary'];
                 }
?>

<tr>
<td><input type="checkbox" class="checkbox" id="myc" value="<?php echo $ID;?>" name="choices[]"></td>
<td><?php print $ID;?></td>
<td><?php print $name;?></td>
<td><?php print $title;?></td>
<td><?php print $price;?></td>
<td><?php print $stock;?></td>
<td><?php print $summary;?></td>
</tr>
<?
         }
         else
             printf("Error with the DB result set!\n");
     }
?>
</tbody></table>
<br />
<p /><input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
<input type="hidden" name="department" value="<? print $department;?>">
<input type="hidden" name="username" value="<? print $username;?>">
</form>
<h2>Please check any items that you would like to purchase!</h2>
</font></body></html>
<?
mysqli_close($link);

?>
</pre>
</body>
</html>
