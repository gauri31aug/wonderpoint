<html>
<head>
<title>users list</title>
<style>
table
{
border-spacing:0px;
border-collapse:none;
}

td, th
{
border:1px solid black;
text-align:left;
width:10%;
}
</style>
<body>

<?php

$servername="localhost";
$username="gauri";
$password="";
$dbname="test";

$conn=mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
  die("Connection failed:".mysqli_connect_error());
}
else
{
  $list="select * from users";
  $result=mysqli_query($conn,$list) or die("Query failed:".mysqli_error());
?>

<h3>List Users</h3>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Gender</th>
<th>Education</th>
<th>Skills</th>
</tr>

<?php

while($row=mysqli_fetch_array($result))
{
?>	

  <tr>
  <td><?=$row[0] ?></td>
  <td><?=$row[1] ?></td>
  <td><?=$row[2] ?></td>
  <td><?=$row[3] ?></td>
  <td><?=$row[4] ?></td>
  <td><?=$row[5] ?></td>
  </tr>
  
<?php

}//while
}//else
	
mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>