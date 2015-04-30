<!doctype html public "-//W3C//DTD HTML 4.0 //EN"> 
<html>
<head>
       <title>Title here!</title>
</head>
<body bgcolor = "#D2B48C">
<pre>
<?

//FILENAME : ABozzelli_BB2.php
//PROGRAMMER : Andrew Bozzelli
//PURPOSE : Process form and query database, call BB3

          extract($_POST);

          if (!isset($dept))
          {
           printf("No department selected.\n");
           printf("Please push your back button and choose at least one!\n");
           }

       else
       {

          $link = mysqli_connect("localhost", "root", "Terri_33");
          if (!$link)
             die("Could not connect: " . mysql_error());

          if (!mysqli_select_db($link,"cpt283db"))
             die("Problem with the database: " . mysql_error());

?>
<form action = "ABozzelli_BB3.php" method = "POST">
<h1>Welcome to BB's Online Shopping Center!</h1>
<h2>Here are the products in <?php echo $dept, ", ", $username; ?><h2>
<h3>Please check any items you are interested in:<h3>
<table cellspacing="2" cellpadding="2" id="tabid" border='1'>
<thead>
<tr>
<th><strong>Choose</strong></th>
<th><strong>ID Number</strong></th>
<th><strong>AUTHOR/ARTIST</strong></th>
<th><strong>Title</strong></th>
<th><strong>Media</strong></th>
<th><strong>Feature</strong></th>
</tr>
</thead>
<tbody>

<?php

    $query = "SELECT * FROM products WHERE department = '$dept' ORDER BY entertainerauthor";

    $result = mysqli_query($link,$query);

    while ($row = mysqli_fetch_assoc($result))
      {
        $ID = $row['ID'];
        $entertainerauthor = $row['entertainerauthor'];
        $title = $row['title'];
        $media = $row['media'];
        $feature = $row['feature'];

?>
<tr>
<td><input type="checkbox" class="checkbox" id="myc" value="<?php echo $ID;?>" name="choices[]"></td>
<td><?php echo $ID;?></td>
<td><?php echo $entertainerauthor;?></td>
<td><?php echo $title;?></td>
<td><?php echo $media;?></td>
<td><?php echo $feature;?></td>
</tr>
<?

      }
?>
</tbody></table>
</font><p /><input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
<input type="hidden" name="department" value="<?php echo $dept;?>">
<input type="hidden" name="username" value="<?php echo $username;?>">
</form></body></html>

<?
    mysqli_close($link);
}
?>

</pre>
</body>
</html>
