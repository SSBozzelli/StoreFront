<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>Title here!</title>
</head>
<body bgcolor = "#D2B48C" >
<pre>
<?
//FILENAME : ABozzelli_BB1.php
//PROGRAMMER : Andrew Bozzelli
//PURPOSE : Show departments, call BB2

          extract($_POST);

          if ($enter == 2)
          {
             printf("<h2>We hope to see you again soon at BB's Online Superstore!!</h2>");

          }
          else if (empty($username))
          {
                 printf("<h2>You did not enter a user name. Please press the BACK button.\n</h2>");
          }

          else
          {
                 $link = mysqli_connect("localhost", "root", "Terri_33");
                 if (!$link)
                    die("Could not connect: " . mysql_error());

                 if (!mysqli_select_db($link,"cpt283db"))
                    die("Problem with the database: " . mysql_error());

                 $query = "SELECT DISTINCT department FROM products";
                 $result = mysqli_query($link,$query);
?>
<form action = "ABozzelli_BB2.php" method = "POST">
<h1>Welcome to BB's Online Shopping Center!</h1>
Please select any department to see the listings:

<?
    while ($row = mysqli_fetch_assoc($result))
      {
        $dept = $row['department'];
?>
<input type="radio" value= <? print $dept;?> name= "dept"><? print $dept;
      }
?>
<br /><input type = "submit" value = "SUBMIT"><input type = "reset" value = "CLEAR">
<input type="hidden" name="username" value="<? print $username;?>">
<input type="hidden" name="dep" value="<? print $dept;?>">
</form>
</body>
</html>

<?
    mysqli_close($link); //Close the db connection
}

?>
</pre>

