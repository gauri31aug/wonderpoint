<?php

$servername="localhost";
$username="gauri";
$password="";
$dbname="test";

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$education=$_POST['education'];
$skills=$_POST['skills'];


$conn=mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
  die("Connection failed:".mysqli_connect_error());
}
else
{
  //check if email id already exists in database
  $checkemail="select email from users where email='$email'";
  $result=mysqli_query($conn,$checkemail) or die("Query failed:".mysqli_error());
  $row=mysqli_fetch_row($result);
  
  if("$email"=="$row[0]")
  {
    echo "Email Id $email already exists in database; please choose another id!";  
	echo "<br><br><a href=\"add_user.html\">Go Back</a>";
  }
  else
  {
    $insert="insert into users(firstname, lastname, email, gender, education, skills) values('$fname', '$lname', '$email', '$gender', '$education', '$skills');";
    if(mysqli_query($conn,$insert))
    {
	   echo "Record added successfully to database!";
	   echo "<br><br><a href=\"add_user.html\">Go Back</a>";
    }
    else
    {
      die("Query failed:".mysqli_error());
    }
  }
}

mysqli_free_result($result);
mysqli_close($conn);

?>