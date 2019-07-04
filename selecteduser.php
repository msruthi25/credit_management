<html>
<head>
<title>Table with database</title>
<center>
</head>
<body>
    <div class="contact-form">
        <h2>VIEW SELECTED USER</h2>
        <form action="" method="post">
            <input type="number" name="id1" placeholder="Enter id">
		    <input type="submit" name="search" value="Submit">
         </form>
	</div>
</body>
</html>
<style>
body
{
	background-image: url("4.jpeg");
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
}
    .contact-form
        {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 300px;
            height: 300px;
            padding: 40px 40px;
            box-sizing: border-box;
            background: rgba(0,0,0,.5);
        }
       
        .contact-form h2
		{
            margin: 0;
            padding: 0 0 20px;
            color: #fff;
            text-align: center;
            text-transform: uppercase;
        }
        .contact-form p
        {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #fff;
        }
        .contact-form input
        {
            width: 100%;
            margin-bottom: 20px;
        }
        .contact-form input[type="number"]
        {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }
  .contact-form input[type="submit"] {
            height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 20px;
            border: none;
            outline: none;
            margin-top: 15%;
        }
		 input[type="checkbox"]
		{
            width: 20%;
        }
table
  {
   position: absolute;
   top: 60%;
  left:25%;
   border-collapse: collapse;
   height:50px;
   width: 50%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
  } 
  th
  {
   height:10px;
   background-color: #588c7e;
   color: white;
  }
  a
  {
			height: 30px;
            color: #fff;
            font-size: 15px;
            background: red;
            cursor: pointer;
            border-radius: 20px;
            border: none;
            outline: none;
			margin-top: 15%;
  }
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
  <th>Id</th> 
  <th>Username</th> 
  <th>Balance</th>
</tr>
<?php
$host="127.0.0.1";
$username="root";
$password="";
$db_name="credit_management";
$conn=new mysqli($host,$username,$password,$db_name);
error_reporting(0);
ini_set('display_errors',0);
if(isset($_POST['search']))
{
  $id1 = $_POST['id1'];
}
$sql ="SELECT id, username,balance FROM credit where `id` = $id1";
$result = $conn->query($sql);
if($result->num_rows==0)
{
$sql ="SELECT id, username,balance FROM credit where `id` = 1001";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
	echo "<tr class='info'><td>".$row["id"]. "</td><td>" . $row["username"] . "</td><td>".$row["balance"]. "</td> <td>";
}
echo "</table>";
}
if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
	echo "<tr class='info'><td>".$row["id"]. "</td><td>" . $row["username"] . "</td><td>".$row["balance"]. "</td> <td>";
}
echo "</table>";
}

$conn->close();
?>
<center>
</table>
<center>
</body>
</html>
